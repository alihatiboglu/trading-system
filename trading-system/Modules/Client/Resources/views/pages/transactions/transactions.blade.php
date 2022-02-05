@extends('client::layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>{{ __('main.transactions_history') }}</h1>
                    <h5></h5>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-heading border-dark">
                <h4 class="card-title">
                    <span></span>
                </h4>
            </div>
            <div class="card-body pt0 pb0">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>{{ __('main.amount') }}</th>
                            <th>{{ __('main.getway') }}</th>
                            <th>{{ __('main.transaction_type') }}</th>
                            <th>{{ __('main.date') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td>{{ $item->amount }} USD</td>
                                <td>{{ $item->getway}}</td>
                                <td>{{ $item->type}}</td>
                                <td>{{ $item->created_at->format('d/m/Y') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>{{ __('main.amount') }}</th>
                            <th>{{ __('main.getway') }}</th>
                            <th>{{ __('main.transaction_type') }}</th>
                            <th>{{ __('main.date') }}</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                {{ $items->links() }}
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-heading border-dark">
                <h4 class="card-title">
                        <span>
                            Important Informations                        </span>
                </h4>
            </div>
            <div class="card-body pt0 pb0">
                <!-- ngIf: (target == 'deposit') --><div ng-if="(target == 'deposit')" class="ng-scope">
                    <p>
                    </p><p>In case of no trading activity, or if any form of abuse is found relating to the reimbursement policy, FXTM reserves the right to reclaim any reimbursement fees. If you request to withdraw your funds after no trading activity, FXTM reserves the right to charge you the equivalent amount of any banking fees incurred, or 3% of the total withdrawal amount.</p>


                    <p>Deposits are processed instantly in case there is no need for additional verification. FXTM is not liable for any transfer delays you may experience due to a disruption of service in the system of the payment processor.</p>
                    <p>All Back office transfers are processed during standard business hours, i.e. 06:00-20:00 GMT +2 (GMT+3 during DST), Mon-Fri&nbsp;and Sunday 09:00 - 18:00 GMT+2 (GMT+3 DST).</p>                            <p></p>
                </div><!-- end ngIf: (target == 'deposit') -->
                <!-- ngIf: (target != 'deposit') -->
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection


