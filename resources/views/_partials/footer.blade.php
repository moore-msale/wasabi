<div class="container-fluid bg-dark mt-4">
    <?php
    $agent = new \Jenssegers\Agent\Agent();
    ?>
    @if(!$agent->isPhone())
        <div class="row">
            <div class="col-lg-3 col-12 d-flex align-items-center justify-content-center pt-lg-0 pt-5">
                <a href="/">
                    <img src="{{ asset('images/logo.png') }}" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-12 p-3 mt-lg-3 mt-1 text-white text-lg-left text-center">
                <h3 class="pb-1">Главное</h3>
                <a href="/delivery">
                    <p class="footer-point">
                        Условия доставки
                    </p>
                </a>
                <a href="/stock">
                    <p class="footer-point">
                        Акции
                    </p>
                </a>
                <a href="/about_us">
                    <p class="footer-point">
                        О нас
                    </p>
                </a>
            </div>
            <div class="col-lg-3 col-12 p-3 mt-lg-3 mt-1 text-white text-lg-left text-center">
                <h3 class="pb-1">Контакты</h3>
                <a href="https://2gis.kg/bishkek/search/wasabi/firm/70000001036850277?floor=0&m=74.615528%2C42.869249%2F17.57">
                    <p class="footer-point">
                        Адрес: Московская 51, пересекает Шопокова.
                    </p>
                </a>
                <a href="tel:0505 41 07 07">
                    <p class="footer-point">
                        0505 41 07 07
                    </p>
                </a>
                <a href="tel:0552 41 07 07">
                    <p class="footer-point">
                        0552 41 07 07
                    </p>
                </a>
            </div>
            <div class="col-lg-3 col-12 p-3 mt-lg-3 mt-1 text-white text-lg-left text-center">
                <h3 class="pb-1">Мы в соц.сетях</h3>
                <a href="https://www.instagram.com/wasabi_kg/">
                    <p class="d-flex align-items-center footer-point justify-content-lg-start justify-content-center">
                        <i class="fab fa-instagram fa-2x mr-2"></i> wasabi_kg
                    </p>
                </a>
                <a href="https://www.facebook.com/wasabi.kg/?modal=admin_todo_tour">
                    <p class="d-flex align-items-center footer-point justify-content-lg-start justify-content-center">
                        <i class="fab fa-facebook-square fa-2x mr-2"></i> wasabi.kg
                    </p>
                </a>
            </div>
        </div>
    @else
        <div class="row justify-content-center">
            <div class="accordion w-100" id="accordionExample">
                <div class="card z-depth-0 bg-transparent">
                    <div class="card-header w-100 py-3 mb-1" style="border-bottom:1px solid rgba(248,0,0,0.51); border-top: 1px solid rgba(248,0,0,0.51);"
                         id="headingOne">
                        <h5 class="mb-0 h-100">
                            <p class="collapsed mb-0 text-center text-white" data-toggle="collapse"
                               data-target="#collapseOne"
                               aria-expanded="true" aria-controls="collapseOne">
                                Главная
                            </p>
                        </h5>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                         data-parent="#accordionExample">
                        <div class="card-body text-white text-center" style="border-bottom:1px solid rgba(248,0,0,0.51);">
                            <a href="/delivery">
                                <p class="footer-point">
                                    Условия доставки
                                </p>
                            </a>
                            <a href="/stock">
                                <p class="footer-point">
                                    Акции
                                </p>
                            </a>
                            <a href="/about_us">
                                <p class="footer-point">
                                    О нас
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card z-depth-0 bg-transparent">
                    <div class="card-header w-100 py-3 mb-1" style="border-bottom:1px solid rgba(248,0,0,0.51); border-bottom:1px solid rgba(248,0,0,0.51);"
                         id="headingTwo">
                        <h5 class="mb-0 h-100">
                            <p class="collapsed mb-0 text-white text-center " data-toggle="collapse"
                               data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Контакты
                            </p>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body text-white text-center" style="border-bottom:1px solid rgba(248,0,0,0.51);">
                            <a href="https://2gis.kg/bishkek/search/wasabi/firm/70000001036850277?floor=0&m=74.615528%2C42.869249%2F17.57">
                                <p class="footer-point">
                                    Адрес: Московская 51, пересекает Шопокова.
                                </p>
                            </a>
                            <a href="tel:0505 41 07 07">
                                <p class="footer-point">
                                    0505 41 07 07
                                </p>
                            </a>
                            <a href="tel:0552 41 07 07">
                                <p class="footer-point">
                                    0552 41 07 07
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                {{--<div class="card z-depth-0 bg-transparent">--}}
                {{--<div class="card-header w-100 py-3" id="headingThree">--}}
                {{--<h5 class="mb-0 h-100">--}}
                {{--<p class="collapsed mb-0 text-white text-center " data-toggle="collapse"--}}
                {{--data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">--}}
                {{--Условия доставки--}}
                {{--</p>--}}
                {{--</h5>--}}
                {{--</div>--}}
                {{--<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">--}}
                {{--<div class="card-body text-white text-center">--}}
                {{--Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3--}}
                {{--wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum--}}
                {{--eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla--}}
                {{--assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred--}}
                {{--nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer--}}
                {{--farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus--}}
                {{--labore sustainable.--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
            </div>
            <div class="col-12 py-4">
                <div class="row">
                    <div class="col-3 text-center">
                        <a href="tel:+996505410707">
                            <i class="fas fa-phone text-white fa-2x"></i>
                        </a>
                    </div>
                    <div class="col-6 text-center">
                        <a href="https://www.instagram.com/wasabi_kg/">
                            <i class="fab fa-instagram fa-2x text-white mr-2"></i>
                        </a>
                        <a href="https://www.facebook.com/wasabi.kg/?modal=admin_todo_tour">
                            <i class="fab fa-facebook-square text-white fa-2x"></i>
                        </a>
                    </div>
                    <div class="col-3 text-center">
                        <a href="https://api.whatsapp.com/send?phone=996505410707">
                            <i class="fab fa-whatsapp text-white fa-2x"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>