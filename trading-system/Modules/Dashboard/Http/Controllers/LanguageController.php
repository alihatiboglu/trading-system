<?php

namespace Modules\Dashboard\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Translation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App;
use Lang;
use Spatie\TranslationLoader\LanguageLine;

class LanguageController extends Controller
{
    private $view_index  = 'dashboard::pages.languages.index';
    private $view_edit   = 'dashboard::pages.languages.create_edit';
    private $view_translations = 'dashboard::pages.languages.translations';
    private $route       = 'languages';
    private $lang = '';
    private $file;
    private $key;
    private $value;
    private $path;
    private $arrayLang = [];

    public function __construct()
    {
    }


    public function index(Request $request)
    {
        $items = Language::with('addedBy:id,name')
            ->with('editedBy:id,name')
            ->paginate(30);
        return view($this->view_index, compact('items'));
    }


    public function create()
    {
        return view($this->view_edit);
    }


    public function edit($id)
    {
        $item = Language::findOrFail($id);
        return view($this->view_edit, compact('item'));
    }


    public function destroy($id)
    {
        $item = Language::findOrFail($id);
        if ($item) {
            if (Language::where('id', $id)->delete()) {
                flash('Language deleted.')->success();
                return redirect()->route($this->route. '.index');
            }
        }
        abort(500);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required',
            'code'  => 'required',
        ]);
        $r = $this->processForm($request);
        if ($r) {
            flash('Language updated.')->success();
            return redirect()->route($this->route . '.index');
        }
        abort(500);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'  => 'required',
            'code'  => 'required',
        ]);
        $item = Language::findOrFail($id);
        $r = $this->processForm($request,$id);
        if ($r) {
            flash('Language updated.')->success();
            return redirect()->route($this->route . '.index');
        }
        abort(500);
    }


    protected function processForm($request, $id = null)
    {
        $item = $id == null ? new Language() : Language::find($id);
        $logged = auth()->user();
        if ($id == null || ($id != null && !intval($item->created_by))) {
            $item->created_by = $logged->id;
        } else {
            $item->updated_by = $logged->id;
        }
        $item->name = $request->name;
        $item->code = $request->code;
        $item->rtl = $request->filled('rtl') ? 1 : 0;
        if ($item->save()) {
            return $item;
        }
        return false;
    }


    public function translations(Request $request)
    {
        $languages = Language::all();
        $items = Translation::where(function($query) use($request) {
            if ($request->filled('key')) {
                $query->where('key', 'LIKE', '%'.$request->key.'%');
            }
        })
        ->paginate(30);
        return view($this->view_translations, compact('items', 'languages'));
    }


    public function storeTranslations(Request $request)
    {
        $arrayLang = [];
        $current_locale = app()->getLocale();
        $languages = Language::all();
        foreach ($languages as $language) {
            if(isset($request->values[$language->code]) && is_array($request->values[$language->code])) {
                app()->setLocale($language->code);
                $path = base_path().'/resources/lang/'.$language->code.'/main.php';
                if (!file_exists($path)) {
                    return $path . ' not found, please create it';
                }
                $arrayLang = Lang::get('main');
                $arrayLang = is_array($arrayLang) ? $arrayLang : [];
                foreach ($request->values[$language->code] as $key => $value) {
                    $arrayLang[$key] = $value;
                }
                if (count($arrayLang) > 0) {
                    $content = "<?php\n\nreturn\n[\n";
                    foreach ($arrayLang as $key => $value)
                    {
                        $value = str_replace("'", "\'", $value);
                        $content .= "\t'".$key."' => '".$value."',\n";
                        /*******************************/
                        $trans = Translation::where('key', 'LIKE', $key)->first();
                        if (!$trans) {
                            $trans = new Translation();
                        }
                        $trans->group = 'main';
                        $trans->key   = $key;
                        $trans->text  = $value;
                        $trans->save();
                        /*******************************/
                    }
                    $content .= "];";
                    file_put_contents($path, $content);
                }
            }
        }
        app()->setLocale($current_locale);
        flash('Translations updated.')->success();
        return back();
    }

    public function fetch()
    {
        $current_locale = app()->getLocale();
        app()->setLocale('en');
        $arrayLang = Lang::get('main');
        $arrayLang = is_array($arrayLang) ? $arrayLang : [];
        foreach ($arrayLang as $key => $value) {
            /*******************************/
            $trans = Translation::where('key', 'LIKE', $key)->first();
            if (!$trans) {
                $trans = new Translation();
            }
            $trans->group = 'main';
            $trans->key   = $key;
            $trans->text  = $value;
            $trans->save();
            /*******************************/
        }
        app()->setLocale($current_locale);
    }
}
