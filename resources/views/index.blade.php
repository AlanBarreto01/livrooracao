@include ('header')
<div class="slider-area">
            <!-- Slider -->
            <div class="block-slider block-slider4">
                <ul class="" id="bxslider-home4">
                    <li>
                        <img src="/img/h5-slide.png" alt="Slide">
                        <div class="caption-group">
                            <h2 class="caption title">
                                João <span class="primary">Cap 3 <strong>vers. 16</strong></span>
                            </h2>
                            <h5 class="caption subtitle">
                                <textarea disabled style="resize: none" rows="3" cols="50">"Porque Deus amou o mundo de tal maneira que deu o seu Filho unigênito, para que todo aquele que nele crê não pereça, mas tenha a vida eterna."</textarea>
                            </h5>
                            <a class="caption button-radius" href="/biblia-online"><span class="icon"></span>Acessar</a>
                        </div>
                    </li>
                    <li><img src="/img/h5-slide2.png" alt="Slide">
                        <div class="caption-group">
                            <h2 class="caption title">
                                Mateus <span class="primary">Cap 22 <strong>vers. 37-39</strong></span>
                            </h2>
                            <h5 class="caption subtitle">
                                    <textarea disabled style="resize: none" rows="5" cols="50">"E Jesus disse-lhe: Amarás o Senhor, teu Deus, de todo o teu coração, e de toda a tua alma, e de todo o teu pensamento. Este é o primeiro e grande mandamento. E o segundo, semelhante a este, é: Amarás o teu próximo como a ti mesmo."</textarea>
                            </h5>
                            <a class="caption button-radius" href="/biblia-online"><span class="icon"></span>Acessar</a>
                        </div>
                    </li>
                    <li><img src="/img/h5-slide3.png" alt="Slide">
                        <div class="caption-group">
                            <h2 class="caption title">
                                João <span class="primary">Cap 14 <strong>vers. 16-17</strong></span>
                            </h2>
                            <h5 class="caption subtitle">
                                <textarea disabled style="resize: none" rows="5" cols="50">"E eu rogarei ao Pai, e ele vos dará outro Consolador, para que fique convosco para sempre; O Espírito de verdade, que o mundo não pode receber, porque não o vê nem o conhece; mas vós o conheceis, porque habita convosco, e estará em vós."</textarea>
                            </h5>
                            <a class="caption button-radius" href="/biblia-online"><span class="icon"></span>Acessar</a>
                        </div>
                    </li>
                    <li><img src="#" alt="Slide">
                        <div class="caption-group">
                            <h2 class="caption title">
                                Livro <span class="primary">Cap <strong>vers.</strong></span>
                            </h2>
                            <h5 class="caption subtitle">
                                <textarea disabled style="resize: none" rows="5" cols="50"></textarea>
                            </h5>
                            <a class="caption button-radius" href="/biblia-online"><span class="icon"></span>Acessar</a>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- ./Slider -->
    </div> <!-- End slider area -->
    
    
    <br>
<div class="maincontent-area">
    <div class="center">
        <center>
        <div role="tabpanel" class="tab-pane fade in active" id="home">
            <h1>Livro De Oração</h1>        
               
                    <p>
                        <strong>
                            <textarea style="resize: none" rows="32" cols="55" disabled></textarea>
                        </strong>           
                        <strong>
                            <textarea disabled name="desdescription" id="desdescription"  
                         style="resize: none" rows="32" cols="55">@foreach ($users as $user){{$user->name}}
@endforeach

                            </textarea>
                        </strong>
                    </p>
              
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
               
                    </ul>
                </div>

        </div>
        </center>
    </div>
</div> <!-- End main content area -->

    <div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <div class="brand-list"><!--
                            <img src="/res/site/img/brand1.png" alt="">
                            <img src="/res/site/img/brand2.png" alt="">
                            <img src="/res/site/img/brand3.png" alt="">
                            <img src="/res/site/img/brand4.png" alt="">
                            <img src="/res/site/img/brand5.png" alt="">
                            <img src="/res/site/img/brand6.png" alt="">
                            <img src="/res/site/img/brand1.png" alt="">
                            <img src="/res/site/img/brand2.png" alt="">
                            -->                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End brands area -->
    @include ('footer')
