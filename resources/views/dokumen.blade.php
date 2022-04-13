<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Saturnalia</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- CSS Files -->
    <link href="{{asset('ui/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('ui/assets/css/material-bootstrap-wizard.css')}}" rel="stylesheet" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('ui/assets/css/demo.css')}}" rel="stylesheet" />
</head>

<body>
    <div class="image-container set-full-height"
        style=" background: linear-gradient(110deg, #EFFFFD 10% ,#EFFFFD 80%) !important;">
        <!--   Creative Tim Branding   -->
        <a href="#">
            <div class="logo-container">
                <div class="logo">
                    <img src="{{('saturnalia/assets/img/logo1.png')}}">
                </div>
            </div>
        </a>


        <!--  Made With Material Kit  -->
        <a href="http://demos.creative-tim.com/material-kit/index.html?ref=material-bootstrap-wizard"
            class="made-with-mk">
            <div class="brand">D</div>
            <div class="made-with">DISKOMINFO<strong>JATENG</strong></div>
        </a>

        <!--   Big container   -->
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <!--      Wizard container        -->
                    <div class="wizard-container">
                        <div class="card wizard-card" data-color="blue" id="wizard">
                            <form action="" method="">
                                <!--        You can switch " data-color="blue" "  with one of the next bright colors: "green", "orange", "red", "purple"             -->
                                <div class="wizard-header">
                                    <h3 class="wizard-title">
                                        Detail Surat Disposisi
                                    </h3>
                                    <!-- <h5></h5> -->
                                </div>
                                <div class="wizard-navigation">
                                    <ul>
                                        <li><a href="#details" data-toggle="tab">Detail</a></li>
                                        <li><a href="#captain" data-toggle="tab">Disposisi Ke Kasi</a></li>
                                        <li><a href="#description" data-toggle="tab">Disposisi Ke Staff</a></li>
                                        <li><a href="#notulen" data-toggle="tab">Notulen</a></li>

                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane" id="details">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h4 class="info-text"> Details</h4>
                                            </div>
                                            <!-- detail -->
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">email</i>
                                                    </span>
                                                    <h5><strong>Status</strong></h5>
                                                    <div class="form-group label-floating">
                                                        
                                                        <label class="control-label">{{$data['result']['status']}}</label>
                                                        <input name="name" type="text" class="form-control" disabled
                                                            readonly>
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">email</i>
                                                    </span>
                                                    <h5><strong>Tanggal Masuk</strong></h5>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">{{$data['result']['letter_date']}}</label>
                                                        <input name="name" type="text" class="form-control" disabled
                                                            readonly>
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">email</i>
                                                    </span>
                                                    <h5><strong>Nomor Surat</strong></h5>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">{{$data['result']['no_letter']}}</label>
                                                        <input name="name" type="text" class="form-control" disabled
                                                            readonly>
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">email</i>
                                                    </span>
                                                    <h5><strong>Nomor Agenda</strong></h5>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">{{$data['result']['no_agenda']}}</label>
                                                        <input name="name" type="text" class="form-control" disabled
                                                            readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">email</i>
                                                    </span>
                                                    <h5><strong>Dari</strong></h5>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">{{$data['result']['from']}}</label>
                                                        <input name="name" type="text" class="form-control" disabled
                                                            readonly>
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">email</i>
                                                    </span>
                                                    <h5><strong>Perihal</strong></h5>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">{{$data['result']['subject']}}</label>
                                                        <input name="name" type="text" class="form-control" disabled
                                                            readonly>
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">email</i>
                                                    </span>
                                                    <h5><strong>Dilaksanakan Pada</strong></h5>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">{{$data['result']['implementation_place']}}</label>
                                                        <input name="name" type="text" class="form-control" disabled
                                                            readonly>
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">email</i>
                                                    </span>
                                                    <h5><strong>Dilaksanakan Untuk</strong></h5>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Dilaksanakan Untuk</label>
                                                        <input name="name" type="text" class="form-control" disabled
                                                            readonly>
                                                    </div>
                                                </div>
                                                <div class=""style="padding-left:50px">
                                                    <a href="https://docs.google.com/gview?embedded=true&url=https://saturnalia.jatengprov.go.id/{{$data['result']['file']}}" type="button" class="btn btn-info">Lihat PDF</a>
                                                    <a href="" type="button" class="btn btn-info"><svg
                                                            xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                            width="15" height="10" viewBox="0 0 172 172"
                                                            style=" fill:#000000;">
                                                            <g fill="none" fill-rule="nonzero" stroke="none"
                                                                stroke-width="1" stroke-linecap="butt"
                                                                stroke-linejoin="miter" stroke-miterlimit="10"
                                                                stroke-dasharray="" stroke-dashoffset="0"
                                                                font-family="none" font-weight="none" font-size="none"
                                                                text-anchor="none" style="mix-blend-mode: normal">
                                                                <path d="M0,172v-172h172v172z" fill="none"></path>
                                                                <g fill="#ffffff">
                                                                    <path
                                                                        d="M137.6,0c-18.79906,0 -34.13125,15.13063 -34.4,33.8625c0,0.17469 0,0.36281 0,0.5375c0,12.685 6.86656,23.70375 17.0925,29.67c5.07938,2.96969 11.00531,4.73 17.3075,4.73c18.97375,0 34.4,-15.42625 34.4,-34.4c0,-18.97375 -15.42625,-34.4 -34.4,-34.4zM96.535,37.3025l-35.1525,17.63c8.18344,7.095 13.55844,17.3075 14.19,28.81l35.5825,-17.845c-8.30437,-6.97406 -13.80031,-17.13281 -14.62,-28.595zM34.4,51.6c-18.97375,0 -34.4,15.42625 -34.4,34.4c0,18.97375 15.42625,34.4 34.4,34.4c7.05469,0 13.55844,-2.15 19.0275,-5.805c9.23156,-6.16781 15.3725,-16.64906 15.3725,-28.595c0,-12.34906 -6.57094,-23.16625 -16.34,-29.24c-5.2675,-3.27875 -11.42187,-5.16 -18.06,-5.16zM75.5725,88.2575c-0.63156,11.48906 -5.9125,21.80906 -14.0825,28.9175l35.045,17.5225c0.81969,-11.46219 6.22156,-21.6075 14.5125,-28.595zM137.6,103.2c-7.095,0 -13.6525,2.21719 -19.135,5.9125c-9.17781,6.18125 -15.265,16.59531 -15.265,28.4875c0,0.05375 0,0.05375 0,0.1075c-0.14781,0.01344 -0.28219,0.09406 -0.43,0.1075l0.43,0.215c0.22844,18.77219 15.57406,33.97 34.4,33.97c18.97375,0 34.4,-15.42625 34.4,-34.4c0,-18.97375 -15.42625,-34.4 -34.4,-34.4z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </svg></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end Detail -->
                                    <div class="tab-pane" id="captain">
                                        <h4 class="info-text">Disposisi Ke Kasi </h4>
                                        <!-- kasi section -->
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">email</i>
                                                    </span>
                                                    <div class="form-group label-floating">
                                                        <h3>Daftar Kasi</h3>
                                                        <ul class="">
                                                            @foreach ($data['result']['kasi'] as $kasi)
                                                            <li class="">
                                                                <p>{{$kasi['name']}}</p>
                                                                <p>{{$kasi['position']['name']}}</p>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">email</i>
                                                    </span>
                                                    <h5><strong>Didispo Oleh</strong></h5>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">
                                                            {{$data['result']['disposisi_to_kasi_by']['name']}}</label>
                                                        <input name="name" type="text" class="form-control" disabled
                                                            readonly>
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">email</i>
                                                    </span>
                                                    <h5><strong>Didispo Pada</strong></h5>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">{{$data['result']['disposisi_to_kasi_at']}}</label>
                                                        <input name="name" type="text" class="form-control" disabled
                                                            readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group">                                                            
                                                    <div class="form-group">
                                                        <h6><strong>Tentang Surat</strong></h6>                                                                                              
                                                        <textarea class="form-control" id="FormControlTextArea1" rows="12" style="width:23em;"disabled readonly></textarea>    
                                                    </div>                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- kasi end -->
                                    <div class="tab-pane" id="description">
                                        <h4 class="info-text">Disposisi Ke Staff </h4>
                                        <!-- staff section -->
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">email</i>
                                                    </span>
                                                    <div class="form-group label-floating">
                                                        <h3>Daftar Kasi</h3>
                                                        <ul>
                                                        @foreach ($data['result']['staf'] as $staf)
                                                            <li class="">
                                                                <p>{{$staf['name']}}</p>
                                                                <p>{{$staf['position']['name']}}</p>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">email</i>                                                        
                                                    </span>
                                                    <h5><strong>Didispo Oleh</strong></h5>
                                                    <div class="form-group label-floating">
                                                        @if (empty($data['result']['disposisi_to_staf_by']['name']))
                                                        <label class="control-label"></label>
                                                        @else
                                                        <label class="control-label">$data['result']['disposisi_to_staf_by']['name']</label>
                                                        @endif
                                                        <input name="name" type="text" class="form-control" disabled
                                                            readonly>
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">email</i>
                                                    </span>
                                                    <h5><strong>Didispo Pada</strong></h5>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">{{$data['result']['disposisi_to_staf_at']}} 
                                                        </label>
                                                        <input name="name" type="text" class="form-control" disabled
                                                            readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <div class="form-group">                                                        
                                                        <div class="form-group label-floating">
                                                            <h6><strong>Tentang Surat</strong></h6>                                                                                              
                                                            <textarea class="form-control" id="FormControlTextArea1" rows="12" style="width:23em;"disabled readonly></textarea>    
                                                        </div>                
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- staff end -->
                                    <div class="tab-pane" id="notulen">
                                        <h4 class="info-text">Notulen </h4>
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder=""
                                                id="floatingTextarea2" style="height: 100px" disabled
                                                readonly>{{$data['result']['notulen']}} </textarea>
                                        </div>
                                    </div>
                                    <div class="wizard-footer">
                                        <div class="pull-right">
                                            <input type='button' class='btn btn-next btn-fill btn-info btn-wd'
                                                name='next' value='Next' />
                                            <input type='button' class='btn btn-finish btn-fill btn-info btn-wd'
                                                name='finish' value='Finish' />
                                        </div>
                                        <div class="pull-left">
                                            <input type='button' class='btn btn-previous btn-fill btn-info btn-wd'
                                                name='previous' value='Previous' />

                                            <div class="footer">
                                                <div class="col-sm-12">
                                                    <!-- <div class="checkbox">
												  <label>
                                                  
												  </label>
											  </div> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                            </form>
                        </div>
                    </div> <!-- wizard container -->
                </div>
            </div> <!-- row -->
        </div> <!--  big container -->

        <div class="footer">
            <div class="container text-center">
                <!-- Made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a>. Free download <a href="http://www.creative-tim.com/product/material-bootstrap-wizard">here.</a> -->
            </div>
        </div>
    </div>

</body>
<!--   Core JS Files   -->
<script src="{{asset('ui/assets/js/jquery-2.2.4.min.js')}}" type="text/javascript"></script>
<script src="{{asset('ui/assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('ui/assets/js/jquery.bootstrap.js')}}" type="text/javascript"></script>

<!--  Plugin for the Wizard -->
<script src="{{asset('ui/assets/js/material-bootstrap-wizard.js')}}"></script>

<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
<script src="{{asset('ui/assets/js/jquery.validate.min.js')}}"></script>

</html>