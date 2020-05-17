<div class="row">
        
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    @php
                    $array = array(array('metaname' => 'color', 'metavalue' => 'blue'),
                                    array('metaname' => 'size', 'metavalue' => 'big'));
                    @endphp
                    <form method="POST" action=" {{ route('pay') }} " id="paymentForm" >
                    @csrf
                    
                    <div class="col-12">

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="firstname"> {{ translate('school_name') }}</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control"  value="{{ $school_name }}" disabled>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="email">{{ translate('email') }}</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="{{ $email }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="phonenumber"> {{ translate('phone_number') }} </label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ $phone }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="birthdatepicker">{{ translate('number_of_students') }}</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control date" value="{{ $students_count }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="amount"> {{ translate('amount_to_pay') }} </label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ $cost }}" disabled>
                            </div>
                        </div>

                        <input type="hidden" name="amount" value="{{$cost}}" /> <!-- Replace the value with your transaction amount -->
                        <input type="hidden" name="payment_method" value="both" /> <!-- Can be card, account, both -->
                        <input type="hidden" name="description" value="{{$desc}}" /> <!-- Replace the value with your transaction description -->
                        <input type="hidden" name="country" value="{{$country}}" /> <!-- Replace the value with your transaction country -->
                        <input type="hidden" name="currency" value="{{$currency}}" /> <!-- Replace the value with your transaction currency -->
                        <input type="hidden" name="email" value="{{$email}}" /> <!-- Replace the value with your customer email -->
                        <input type="hidden" name="firstname" value="{{$school_name}}" /> <!-- Replace the value with your customer firstname -->
                        <input type="hidden" name="lastname" value="School" /> <!-- Replace the value with your customer lastname -->
                        <input type="hidden" name="metadata" value="{{ json_encode($array) }}" > <!-- Meta data that might be needed to be passed to the Rave Payment Gateway -->
                        <input type="hidden" name="phonenumber" value="{{$phone}}" />
                        <input type="hidden" name="ref" value="{{$get_ref->tx_ref_id}}" />

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary col-md-4 col-sm-12">{{ translate('pay') }}</button>
                        </div>
                    </form>
                    <h1></h1>
                    <h3>INVOICES</h3>
                    <div class="table-responsive-sm">
                        <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th>{{ translate('date') }}</th>
                                    <th>{{ translate('amount') }}</th>
                                    <th>{{ translate('transaction_ID') }}</th>
                                    <th>{{ translate('status') }}</th>
                                    <th>{{ translate('option') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $get_payments as $payment)
                                    <tr>
                                        <td> {{ date('D d/m/Y G:ia'), $payment->time_stamp }} </td>
                                        <td> {{ $payment->amount }} </td>
                                        <td> {{ $payment->tranx_id }} </td>
                                        <td> {{ $payment->status }} </td>
                                        <td>
                                            <div class="btn-group mb-2">
                                                <button>{{ translate('receipt') }}</button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div>
    </div>
