@extends('admin.master')

@section('title')
    طباعة 
@endsection

@section('sectionName')
طباعة الفاتوره
@endsection

@section('pageName')
طباعة
@endsection


@section('style')

<link href="https://fonts.googleapis.com/css?family=El+Messiri" rel="stylesheet"> 

<style>
    .main-font, h5, h3 { font-family: 'El Messiri' !important }
    .hie{
        height: 150px;
        display: block;
    }
    .d-none {display: none}
        @media print {
            @page { margin: 0 auto; }
            .page-header, .d-print-none, .footer, .sidebar {
                display: none
            }
            .panel {
                border: none
            }
            .d-block {
                display: block
            }
            
        }
    
</style>

@endsection

@section('content')


  
<div class="col-md-12">
        <div class="panel panel-flat">
            <div class="panel-heading d-print-none">
                    <a href="#" onclick="window.print()" id="print-pay" class="btn btn-info pull-right"> طباعة <i class="icon-printer"></i></a>
            </div>

            <br>

            <div class="panel-body">
                <fieldset>
                    <div class="collapse in" id="demo1">
                        <table>
                            <!-- Reservation Now -->
                            <div class="now">
                                <div class="text-center" data-wow-duration="2s">
                                    <h3 class="main-font">ايصال سداد مديونية</h3>
                                </div>
                                <div class="text-center d-print-block">
                                    <h3 class=" mb-4">موقع صالون</h3>
                                </div>
                                <div class="invoice">
                                    <div class="row">
                                        <div class="col-xs-6 mb-3">
                                            <h5 class=" font-weight-bold"> اسم المشغل : {{ $data->company->name }}
                                                <span class="text-dark font-weight-normal"></span>
                                            </h5>
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <h5 class=" font-weight-bold"> العنوان : {{ $data->company->location_text }}
                                                
                                            </h5>
                                        </div>
                                        <div class="col-xs-6 mb-3">
                                            <h5 class="font-weight-bold"> جوال المشغل : {{ $data->company->phone }}
                                                    <span class="text-dark font-weight-normal"></span>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="row">
                                        <div class="col-xs-6 mb-3">
                                            <h5 class=" font-weight-bold">التاريخ : {{  date_format($data->created_at, 'Y/m/d') }}
                                                <span class="text-dark font-weight-normal">  </span>
                                            </h5>
                                        </div>
                                        <div class="col-xs-6 mb-3">
                                            <h5 class=" font-weight-bold"> جوال الموقع : {{ Settings()['phone'] }}
                                                    <span class="text-dark font-weight-normal">  </span>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-bordered table-hover">
                                                <thead class="bg-white text-dark">
                                                <tr>
                                                    <th class="font-weight-normal"> المبلغ المدفوع </th>
                                                    <th class="font-weight-normal"> المبلغ المتبقي</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>   {{ $data->payed }}   ر.س  <span class="hie"></span></td>
                                                    <td>     {{ $data->base }}  ر.س <span class="hie"></span></td>
                                                  
                                                </tr>
                                            
                                                </tbody>
                                            </table>
                                        </div>
                                     <!--   <div class="col-xs-12 col-print p-0">
                                            <h4 class=" font-weight-bold mb-3 mt-4 main-font">تفاصيل الدفع:</h4>
                                            <ul class="list-unstyled p-0">
                                                <li class="mb-3">
                                                    <span class="font-weight-bold"> المبلغ المدفوع:</span>  ر.س
                                    
                                                </li>
                                                <li class="mb-3">
                                                    <span class="font-weight-bold"> المبلغ المتبقي:</span>  ر.س
                                                </li>
                                                <li class="mb-3">
                                                    <span class="font-weight-bold"> المبلغ الكلي:</span> ر.س
                                                </li>
                                            </ul>
                                            
                                        </div> -->
                                        <h2 class="pull-right main-font d-none d-block">التوقيع : صالون</h2> 
                                    </div>
                                </div>
                            </div>  
                                               
                        </table>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
@endsection

