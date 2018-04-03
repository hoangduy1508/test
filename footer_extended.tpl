                </div>
            </section>
        </div>
        <footer id="footer">
            <div class="wraper">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-24 col-md-20 " style="margin: auto;float: none;">                   
                            <div class="col-xs-24 col-sm-8 col-md-8">
                                [COMPANY_INFO]
                            </div>
                            
                            <div class="col-xs-24 col-sm-4 col-md-6">
                                [MENU_FOOTER]
                            </div>
                              <div class="col-xs-24 col-sm-6 col-md-5" style="border-right: 1px solid #d2d2d2;">
                            [FEATURED_PRODUCT]
                            </div>
                            <div class="col-xs-24 col-sm-6 col-md-5">
                                [QR_CODE]
                            </div>
                        </div> 
                    </div>
                   
                </div>
            </div>
        </footer>
        <nav class="footerNav2">
            <div class="wraper">
                <div class="container">
                    <!-- BEGIN: theme_type -->
                    <div class="theme-change">
                    <!-- BEGIN: loop -->
                        <!-- BEGIN: other -->
                        <a href="{STHEME_TYPE}" rel="nofollow" title="{STHEME_INFO}"><em class="fa fa-{STHEME_ICON} fa-lg"></em></a>
                        <!-- END: other -->
                        <!-- BEGIN: current -->
                        <span title="{LANG.theme_type_select}: {STHEME_TITLE}"><em class="fa fa-{STHEME_ICON} fa-lg"></em></span>
                        <!-- END: current -->
                    <!-- END: loop -->
                    </div>
                    <!-- END: theme_type -->
                    <div class="col-xs-24 col-sm-24 col-md-24" style="margin:auto; text-align:center">
                            <div class="panel-body">
                            	[FOOTER_SITE]
                            </div>
                            <div class="col-xs-24 col-sm-24 col-md-14">
                            	
                            </div>
                    </div>
                    
                </div>
            </div>
            <div id="tuyendungnhansu"><a href="#"><span id="closetuyendung" style="font-size: 17px;display: -webkit-box;position: absolute;top: 0px;color: #FFF;left: 5px;">X</span></a><a href="/vi/news/tin-tuc/thong-bao-tuyen-dung-27.html"><img src="/themes/default/images/tuyendung.jpg" /></a></div>
        </nav>
        {ADMINTOOLBAR}
    </div>
    <!-- SiteModal Required!!! -->
    <div id="sitemodal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <em class="fa fa-spinner fa-spin">&nbsp;</em>
                </div>
                <button type="button" class="close" data-dismiss="modal"><span class="fa fa-times"></span></button>
            </div>
        </div>
    </div>
    <script>
$(document).ready(function(){
    $("#closetuyendung").click(function(){
        $("#tuyendungnhansu").hide(1000);
    });
});
</script>

