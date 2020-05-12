@extends('userclient.layouts.app')

@push('css')
<link href="{{asset('admins/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css/')}}" rel="stylesheet">
<style>
    #coverage h2 {
        font-weight: 500
    }

    #coverage .icon i {
        font-size: 58px
    }

    #coverage h3 {
        font-weight: 500
    }

    #coverage button {
        border-radius: 1.2em;
    }

    .template ul {
        list-style-type: none;
    }

    .template li {
        display: inline-block;
    }

    #online-data .template input[type="radio"][id^="myCheckbox"] {
        display: none;
    }

    #online-data .template label {
        border: 1px solid #fff;
        /* padding: 10px; */
        display: block;
        position: relative;
        /* margin: 10px; */
        cursor: pointer;
    }

    #online-data .template label:before {
        background-color: white;
        color: white;
        content: " ";
        display: block;
        border-radius: 90%;
        /* border: 1px solid grey; */
        position: absolute;
        top: -5px;
        left: -5px;
        width: 25px;
        height: 25px;
        text-align: center;
        line-height: 28px;
        transition-duration: 0.4s;
        transform: scale(0);
    }

    #online-data .template label img {
        height: 110px;
        width: 100%;
        object-fit: cover;
        object-position: center;
        transition-duration: 0.2s;
        transform-origin: 50% 50%;
    }

    #online-data .template :checked+label {
        border-color: #ddd;
    }

    #online-data .template :checked+label:before {
        content: "✓";
        background-color: #ef7341;
        z-index: 999;
        transform: scale(1);
    }

    #online-data .template :checked+label img {
        transform: scale(0.9);
        /* box-shadow: 0 0 5px #333; */
        z-index: -1;
    }

        .book {
            --color: #f7ae00;
            ;
            --duration: 6.8s;
            width: 32px;
            height: 12px;
            position: relative;
            margin: 32px 0 0 0;
            zoom: 1.5;
            top: -25px
        }

        .book .inner {
            width: 32px;
            height: 12px;
            position: relative;
            transform-origin: 2px 2px;
            transform: rotateZ(-90deg);
            animation: book var(--duration) ease infinite;
        }

        .book .inner .left,
        .book .inner .right {
            width: 60px;
            height: 4px;
            top: 0;
            border-radius: 2px;
            background: var(--color);
            position: absolute;
        }

        .book .inner .left:before,
        .book .inner .right:before {
            content: '';
            width: 48px;
            height: 4px;
            border-radius: 2px;
            background: inherit;
            position: absolute;
            top: -10px;
            left: 6px;
        }

        .book .inner .left {
            right: 28px;
            transform-origin: 58px 2px;
            transform: rotateZ(90deg);
            animation: left var(--duration) ease infinite;
        }

        .book .inner .right {
            left: 28px;
            transform-origin: 2px 2px;
            transform: rotateZ(-90deg);
            animation: right var(--duration) ease infinite;
        }

        .book .inner .middle {
            width: 32px;
            height: 12px;
            border: 4px solid var(--color);
            border-top: 0;
            border-radius: 0 0 9px 9px;
            transform: translateY(2px);
        }

        .book ul {
            margin: 0;
            padding: 0;
            list-style: none;
            position: absolute;
            left: 50%;
            top: 0;
        }

        .book ul li {
            height: 4px;
            border-radius: 2px;
            transform-origin: 100% 2px;
            width: 48px;
            right: 0;
            top: -10px;
            position: absolute;
            background: var(--color);
            transform: rotateZ(0deg) translateX(-18px);
            animation-duration: var(--duration);
            animation-timing-function: ease;
            animation-iteration-count: infinite;
        }

        .book ul li:nth-child(0) {
            animation-name: page-0;
        }

        .book ul li:nth-child(1) {
            animation-name: page-1;
        }

        .book ul li:nth-child(2) {
            animation-name: page-2;
        }

        .book ul li:nth-child(3) {
            animation-name: page-3;
        }

        .book ul li:nth-child(4) {
            animation-name: page-4;
        }

        .book ul li:nth-child(5) {
            animation-name: page-5;
        }

        .book ul li:nth-child(6) {
            animation-name: page-6;
        }

        .book ul li:nth-child(7) {
            animation-name: page-7;
        }

        .book ul li:nth-child(8) {
            animation-name: page-8;
        }

        .book ul li:nth-child(9) {
            animation-name: page-9;
        }

        .book ul li:nth-child(10) {
            animation-name: page-10;
        }

        .book ul li:nth-child(11) {
            animation-name: page-11;
        }

        .book ul li:nth-child(12) {
            animation-name: page-12;
        }

        .book ul li:nth-child(13) {
            animation-name: page-13;
        }

        .book ul li:nth-child(14) {
            animation-name: page-14;
        }

        .book ul li:nth-child(15) {
            animation-name: page-15;
        }

        .book ul li:nth-child(16) {
            animation-name: page-16;
        }

        .book ul li:nth-child(17) {
            animation-name: page-17;
        }

        .book ul li:nth-child(18) {
            animation-name: page-18;
        }

        @keyframes page-0 {
            4% {
                transform: rotateZ(0deg) translateX(-18px);
            }

            13%,
            54% {
                transform: rotateZ(180deg) translateX(-18px);
            }

            63% {
                transform: rotateZ(0deg) translateX(-18px);
            }
        }

        @keyframes page-1 {
            5.86% {
                transform: rotateZ(0deg) translateX(-18px);
            }

            14.74%,
            55.86% {
                transform: rotateZ(180deg) translateX(-18px);
            }

            64.74% {
                transform: rotateZ(0deg) translateX(-18px);
            }
        }

        @keyframes page-2 {
            7.72% {
                transform: rotateZ(0deg) translateX(-18px);
            }

            16.48%,
            57.72% {
                transform: rotateZ(180deg) translateX(-18px);
            }

            66.48% {
                transform: rotateZ(0deg) translateX(-18px);
            }
        }

        @keyframes page-3 {
            9.58% {
                transform: rotateZ(0deg) translateX(-18px);
            }

            18.22%,
            59.58% {
                transform: rotateZ(180deg) translateX(-18px);
            }

            68.22% {
                transform: rotateZ(0deg) translateX(-18px);
            }
        }

        @keyframes page-4 {
            11.44% {
                transform: rotateZ(0deg) translateX(-18px);
            }

            19.96%,
            61.44% {
                transform: rotateZ(180deg) translateX(-18px);
            }

            69.96% {
                transform: rotateZ(0deg) translateX(-18px);
            }
        }

        @keyframes page-5 {
            13.3% {
                transform: rotateZ(0deg) translateX(-18px);
            }

            21.7%,
            63.3% {
                transform: rotateZ(180deg) translateX(-18px);
            }

            71.7% {
                transform: rotateZ(0deg) translateX(-18px);
            }
        }

        @keyframes page-6 {
            15.16% {
                transform: rotateZ(0deg) translateX(-18px);
            }

            23.44%,
            65.16% {
                transform: rotateZ(180deg) translateX(-18px);
            }

            73.44% {
                transform: rotateZ(0deg) translateX(-18px);
            }
        }

        @keyframes page-7 {
            17.02% {
                transform: rotateZ(0deg) translateX(-18px);
            }

            25.18%,
            67.02% {
                transform: rotateZ(180deg) translateX(-18px);
            }

            75.18% {
                transform: rotateZ(0deg) translateX(-18px);
            }
        }

        @keyframes page-8 {
            18.88% {
                transform: rotateZ(0deg) translateX(-18px);
            }

            26.92%,
            68.88% {
                transform: rotateZ(180deg) translateX(-18px);
            }

            76.92% {
                transform: rotateZ(0deg) translateX(-18px);
            }
        }

        @keyframes page-9 {
            20.74% {
                transform: rotateZ(0deg) translateX(-18px);
            }

            28.66%,
            70.74% {
                transform: rotateZ(180deg) translateX(-18px);
            }

            78.66% {
                transform: rotateZ(0deg) translateX(-18px);
            }
        }

        @keyframes page-10 {
            22.6% {
                transform: rotateZ(0deg) translateX(-18px);
            }

            30.4%,
            72.6% {
                transform: rotateZ(180deg) translateX(-18px);
            }

            80.4% {
                transform: rotateZ(0deg) translateX(-18px);
            }
        }

        @keyframes page-11 {
            24.46% {
                transform: rotateZ(0deg) translateX(-18px);
            }

            32.14%,
            74.46% {
                transform: rotateZ(180deg) translateX(-18px);
            }

            82.14% {
                transform: rotateZ(0deg) translateX(-18px);
            }
        }

        @keyframes page-12 {
            26.32% {
                transform: rotateZ(0deg) translateX(-18px);
            }

            33.88%,
            76.32% {
                transform: rotateZ(180deg) translateX(-18px);
            }

            83.88% {
                transform: rotateZ(0deg) translateX(-18px);
            }
        }

        @keyframes page-13 {
            28.18% {
                transform: rotateZ(0deg) translateX(-18px);
            }

            35.62%,
            78.18% {
                transform: rotateZ(180deg) translateX(-18px);
            }

            85.62% {
                transform: rotateZ(0deg) translateX(-18px);
            }
        }

        @keyframes page-14 {
            30.04% {
                transform: rotateZ(0deg) translateX(-18px);
            }

            37.36%,
            80.04% {
                transform: rotateZ(180deg) translateX(-18px);
            }

            87.36% {
                transform: rotateZ(0deg) translateX(-18px);
            }
        }

        @keyframes page-15 {
            31.9% {
                transform: rotateZ(0deg) translateX(-18px);
            }

            39.1%,
            81.9% {
                transform: rotateZ(180deg) translateX(-18px);
            }

            89.1% {
                transform: rotateZ(0deg) translateX(-18px);
            }
        }

        @keyframes page-16 {
            33.76% {
                transform: rotateZ(0deg) translateX(-18px);
            }

            40.84%,
            83.76% {
                transform: rotateZ(180deg) translateX(-18px);
            }

            90.84% {
                transform: rotateZ(0deg) translateX(-18px);
            }
        }

        @keyframes page-17 {
            35.62% {
                transform: rotateZ(0deg) translateX(-18px);
            }

            42.58%,
            85.62% {
                transform: rotateZ(180deg) translateX(-18px);
            }

            92.58% {
                transform: rotateZ(0deg) translateX(-18px);
            }
        }

        @keyframes page-18 {
            37.48% {
                transform: rotateZ(0deg) translateX(-18px);
            }

            44.32%,
            87.48% {
                transform: rotateZ(180deg) translateX(-18px);
            }

            94.32% {
                transform: rotateZ(0deg) translateX(-18px);
            }
        }

        @keyframes left {
            4% {
                transform: rotateZ(90deg);
            }

            10%,
            40% {
                transform: rotateZ(0deg);
            }

            46%,
            54% {
                transform: rotateZ(90deg);
            }

            60%,
            90% {
                transform: rotateZ(0deg);
            }

            96% {
                transform: rotateZ(90deg);
            }
        }

        @keyframes right {
            4% {
                transform: rotateZ(-90deg);
            }

            10%,
            40% {
                transform: rotateZ(0deg);
            }

            46%,
            54% {
                transform: rotateZ(-90deg);
            }

            60%,
            90% {
                transform: rotateZ(0deg);
            }

            96% {
                transform: rotateZ(-90deg);
            }
        }

        @keyframes book {
            4% {
                transform: rotateZ(-90deg);
            }

            10%,
            40% {
                transform: rotateZ(0deg);
                transform-origin: 2px 2px;
            }

            40.01%,
            59.99% {
                transform-origin: 30px 2px;
            }

            46%,
            54% {
                transform: rotateZ(90deg);
            }

            60%,
            90% {
                transform: rotateZ(0deg);
                transform-origin: 2px 2px;
            }

            96% {
                transform: rotateZ(-90deg);
            }
        }

        html {
            box-sizing: border-box;
            -webkit-font-smoothing: antialiased;
        }

        * {
            box-sizing: inherit;
        }

        *:before,
        *:after {
            box-sizing: inherit;
        }

        #loader {
            min-height: 89vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #00588f;
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            z-index: 999999;
        }
        .select2-container--default{
            width: 100%!important;
        }
        .select2-container--default .select2-selection--multiple {
            background-color: white;
            border: 1px solid #e9ecef!important;
        }

        .select2-container--default .select2-search--inline .select2-search__field {
            color: #000!important;
        }

</style>
@endpush

@section('content')

<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper" id="coverage">
    <div class="container px-5 text-center p-3">
        <h2 class="mt-4 text-dark">Start by adding some coverage to this Report</h2>
        (You can keep adding more later if you need to)

        <div class="px-5">
            <div class="row p-5">
                <div class="col-md-6 px-5">
                    <div class="shadow-sm bg-white py-4 px-3">
                        <div class="icon mt-4">
                            <i class="fa fa-globe"></i>
                        </div>
                        <h3 class="mt-3 text-dark"> Online Coverage</h3>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus commodi hic non in,
                        </p>
                        <a href="javascript:void(0)"><button class="btn btn-outline-info mb-4" onclick="checkClient()"><i class="fa fa-plus"></i> Add
                                online</button></a>
                    </div>
                </div>
                <div class="col-md-6 px-5">
                    <div class="shadow-sm bg-white py-4 px-3">
                        <div class="icon mt-4">
                            <i class="fa fa-book"></i>
                        </div>
                        <h3 class="mt-3 text-dark"> Custom Coverage</h3>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus commodi hic non in,
                        </p>
                        <button class="btn btn-outline-info mb-4" onclick="checkoffline()"><i class="fa fa-plus"></i> Add
                            Custom</button></a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->


    <div id="online-data" class="modal fade hide" tabindex="-1" role="dialog" aria-modal="true"
        style="padding-right: 17px; display: block;">
        <div class="modal-dialog modal-lg">

            <div class="modal-content modal-filled bg-white">
                <div class="modal-body p-4 px-5 position-relative">

                    <p for="" class="text-dark mt-3"><i class="fa fa-book"></i> Online Coverage Report</p>
                    <hr>
                    <h3 class="text-dark">Create Report Title and Select Cover Image</h3>
                    <form action="{{route('coverage_report.store',request('client_id'))}}" method="POST"
                        enctype="multipart/form-data" id="coverage-form">
                        @csrf
                        <div class="">
                            <label for="" class="text-dark">Report Title</label>
                            <input type="text" class="form-control" name="title" required>
                            <div class="">
                                <label for="" class="text-dark mt-3">Report Category</label>
                                <div class="w-100">
                                    <select name="category[]" id="select2" class="form-control js-example-basic-multiple" multiple="multiple">
                                        <option value="Digital">Digital</option>
                                        <option value="Prin">Print</option>
                                        <option value="TV">TV</option>
                                        <option value="Radio">Radio</option>
                                        <option value="Social">Social</option>
                                    </select>
                                    <small class="text-info float-right mt-1">You can select multiple categories.</small>
                                </div>
                            </div>

                            <label for="" class="text-dark mt-3">Urls</label>
                            <textarea class="form-control" name="urls" required rows="5"></textarea>
                            <small class="w-100 text-info text-right float-right mt-1">Urls are comma(,)
                                seprated.</small>

                            <label for="" class="text-dark mt-3 col-md-12 p-0">Cover Image</label>
                            <div class="custom-file">
                                <input type="file" name="cover" class="custom-file-input" id="inputGroupFile04"
                                    accept="image/gif, image/jpeg, image/png">
                                <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                            </div>
                            <div>
                                <label for="" class="text-dark mt-3">Choose Our Prebuilt Template</label>
                                <div class="template row">
                                    <div class="col-md-3">
                                        <input type="radio" name="template" value="" id="myCheckbox3" required />
                                        <label for="myCheckbox3"><img class="img-thumbnail"
                                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTko-DdzwZ-GSL8KTMwYP3zqfuHvRxgr5XOOwbVkJnkqXZq2kLu&usqp=CAU" /></label>
                                        <label for="" class="text-dark">None</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="radio" name="template" value="temp1" id="myCheckbox1" required />
                                        <label for="myCheckbox1"><img class="img-thumbnail"
                                                src="{{asset('frontend/assets/template/temp1.png')}}" /></label>
                                        <label for="" class="text-dark">Basic</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="radio" name="template" value="temp2" id="myCheckbox2" required />
                                        <label for="myCheckbox2"><img class="img-thumbnail"
                                                src="{{asset('frontend/assets/template/temp2.png')}}" /></label>
                                        <label for="" class="text-dark">Social</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="radio" name="template" value="temp3" id="myCheckbox4" required />
                                        <label for="myCheckbox4"><img class="img-thumbnail"
                                                src="{{asset('frontend/assets/template/temp2.png')}}" /></label>
                                        <label for="" class="text-dark">Premium</label>
                                    </div>

                                </div>
                            </div>
                            <button type="submit" class="btn btn-success mt-3 mb-4 px-4 rounded">Create</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- ============================================================== -->
    <div id="custom-data" class="modal fade hide" tabindex="-1" role="dialog" aria-modal="true"
        style="padding-right: 17px; display: block;">
        <div class="modal-dialog modal-md">

            <div class="modal-content modal-filled px-2 bg-white">
                <div class="modal-body p-2 px-4 position-relative">

                    <p for="" class="text-dark mt-3"><i class="fa fa-book"></i> Custom Coverage Report</p>
                    <hr>
                    <h3 class="text-dark">Create Report Title and Select Cover Image</h3>
                    <form action="{{route('coverage_report.store',request('client_id'))}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="">
                            <input type="text" value="custom_report" hidden>
                            <label for="" class="text-dark">Report Title</label>
                            <input type="text" class="form-control" name="title" required>

                            <label for="" class="text-dark mt-3 col-md-12 p-0">Cover Image</label>
                            <div class="custom-file">
                                <input type="file" name="cover" class="custom-file-input" id="inputGroupFile04"
                                    accept="image/gif, image/jpeg, image/png">
                                <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                            </div>
                            <button type="submit" class="btn btn-success mt-3 mb-4 px-4 rounded">Create</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- ============================================================== -->

    <div id="warning-data" class="modal fade hide" tabindex="-1" role="dialog" aria-modal="true"
        style="padding-right: 17px; display: block;">
        <div class="modal-dialog modal-sm">

            <div class="modal-content modal-filled bg-white">
                <div class="modal-body px-4">
                    <p for="" class="text-dark mt-1"><i class="fa fa-exclamation-circle"></i> Message</p>
                    <hr>
                    <h3 class="text-info mb-0">Add a client first </h3>
                    <a href="{{route('clients.create')}}"><small class="text-dark">Click to add client</small></a>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

</div>
</div>
<div class="loader-html" style="display:none">
    <div id="loader" class="w-100 col-md-12 p-0">
        <div class="book">
            <div class="inner">
                <div class="left"></div>
                <div class="middle"></div>
                <div class="right"></div>
            </div>
            <?php $a = 0; ?>
            <ul>
                <?php while($a < 18){ ?>
                <li></li>
                <?php $a= $a +1;  ?>
                <?php } ?>
            </ul>
        </div>
        <h4 class="text-center mt-0"
            style="position: absolute;top: 53%;font-size: 1em;font-weight: 300;padding: 0 111px;"><span
                style="font-size: 2em;width: 100%;display: inline-block;text-transform: uppercase;text-align: center;font-weight:500">Please
                wait</span>
            <span id="message">Sit back and relax while we create report for you.</span></h4>
    </div>
</div>
@endsection

@push('script')
<script src="{{asset('admins/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admins/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
<script>
    $('.hide').hide();
    $('.dataTables_paginate').remove();

    $(function(){
        $('#select2').select2({
            placeholder:"Can select multiple"
        });
    })

    function checkClient(){
        if("{{@$clientexists}}" == 1){
            $('#online-data').modal()
        }else{
            $('#warning-data').modal()
        }
    }

    function checkoffline(){
        $('#custom-data').modal()
    }

    $(function(){
        $('#coverage-form').on('submit',function(e){
            e.preventDefault();
            let loader = $('.loader-html').html();
            $('.modal-body').html(loader)
            let title = $('input[name="title"]').val();
            let url = $('textarea[name="url"]').val();
            let template = $('input[name="template"]:checked', '#coverage-form').val();
            let base_url = window.location.origin;
            $.ajax({
            url: base_url + "/clients/".concat("{{request('client_id') }}", "/report"),
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success : function(_ref) {
            var data = _ref;

            if (data.status) {
                if (data.duplicate_status > 0) {
                    alert(data.duplicate);
                }
                if(data.redirectUrl.url){
                    $('.modal-body #message').html('<span>Redirecting you to the Report builder........<span>');
                    setTimeout(() => {
                        location.href =  `${data.redirectUrl.url}/${data.redirectUrl.report_id}`;
                    }, 500);

                }
            } else {
                $('#loader').hide()
                console.log(data.redirectUrl.url)
            }
            },
            fail: function(){
                $('#loader').hide()
                console.log(err);
            }
        })
        })
    })
</script>
@endpush
