@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body"></div>
                <!-- . -->
                <div class="shows">
                    <div id="now-playing">
                        <div class="show-logo">
                            <img src="../img/pcs_logo.png" />
                        </div>
                        <div class="bottom-text">
                            <h2>Now On-Air</h2>
                            <!--
                            <h4>{ {$ current_show -> $ show_name}}</h4>
                            <div class="producers-broadcast">
                                @ foreach ($current_show->producer as $show_producer)
                                <h6>{ {$ show_producer}}</h6>
                                @ endforeach
                            </div>
                        -->
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div id="coming-next">
                        <div class="show-logo">
                            <img src="../img/pcs_logo.png" />
                        </div>
                        <div class="bottom-text">
                            <h2>Coming Next</h2>
                            <h4>X METAL ZONE</h4>
                            <div class="producers-broadcast">
                                <h6>Παραγωγός 1</h6>
                                <h6>Παραγωγός 2</h6>
                                <h6>Παραγωγός 3</h6>
                                <h6>Παραγωγός 4</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- . -->
            </div>
            <div class="card">
                <div class="card-body">
                    <script id="cid0020000358613931443" data-cfasync="false" async src="//st.chatango.com/js/gz/emb.js" style="width: 250px;height: 350px;">{"handle":"test132348","arch":"js","styles":{"a":"CC0000","b":100,"c":"FFFFFF","d":"FFFFFF","k":"CC0000","l":"CC0000","m":"CC0000","n":"FFFFFF","p":"10","q":"CC0000","r":100,"cnrs":"0.35","fwtickm":1}}</script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection