<?php
include("../../lib/config.php");
?>
<!DOCTYPE html>
<html lang="en" >
<?php include("head.php"); ?>

    <!--begin::Body-->
<body  id="kt_body"  class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed subheader-mobile-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading"  >

    <!--begin::Main-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Login-->
        <div class="login login-3 wizard d-flex flex-column flex-lg-row flex-column-fluid">
            <?php include("aside.php"); ?>

            <!--begin::Content-->
            <div class="login-content flex-column-fluid d-flex flex-column p-10">
                <!--begin::Top-->
                <div class="text-right d-flex justify-content-center">
                    <div class="top-forgot text-right d-flex justify-content-end pt-5 pb-lg-0 pb-10">
                        <span class="font-weight-bold text-muted font-size-h4">Having issues?</span>
                        <a href="javascript:;" class="font-weight-bold text-primary font-size-h4 ml-2" id="kt_login_signup">Get Help</a>
                    </div>
                </div>
                <!--end::Top-->

                <!--begin::Wrapper-->
                <div class="d-flex flex-row-fluid flex-center">
                    <!--begin::Forgot-->
                    <div class="login-form">
                        <!--begin::Form-->
                        <form class="form" id="kt_login_forgot_form" action="">
                            <!--begin::Title-->
                            <div class="pb-5 pb-lg-15">
                                <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Forgotten Password ?</h3>
                                <p class="text-muted font-weight-bold font-size-h4">Enter your Phone Number to reset your password</p>
                            </div>
                            <!--end::Title-->

                            <!--begin::Form group-->
                            <div class="form-group">
                                <input class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6" type="tel" placeholder="Phone Number" name="email" autocomplete="off"/>
                            </div>
                            <!--end::Form group-->

                            <!--begin::Form group-->
                            <div class="form-group d-flex flex-wrap">
                                <button type="submit" id="kt_login_forgot_form_submit_button" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Submit</button>
                                <a href="signin.php"  id="kt_login_forgot_cancel" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3">Cancel</a>
                            </div>
                            <!--end::Form group-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Forgot-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Login-->
	</div>
    <!--end::Main-->


<?php include("script.php"); ?>
    </body>
    <!--end::Body-->
</html>