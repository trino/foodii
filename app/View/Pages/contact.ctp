<div class="row centerall">
    <div class="col-xs-12">
        <div style="transform:skew(-20deg); background:#007FC5;padding:15px 45px;display: inline-block;">
            <h1 class="center" style="color:white;margin:0px;transform:skew(20deg); "><span class="light">Contact</span>
                Charlie's Chopsticks</h1>
        </div>
    </div>
</div>

<div class="container  push-down-30" style=" padding:20px; opacity: 1;
    filter: alpha(opacity=9);">
    <div class="row">
        <div class="col-xs-12">


            <div class="text-shrink">
                <p class="text-highlight">We want to hear from you! Feel free to provide us with suggestions and
                    feedback.</p>
            </div>
            <hr class="divider  divider-about">
            <div class="push-down-30"></div>


            <div class="col-sm-3  push-down-30">
                <div class="row">


                    <img alt="Logo" src="<?php echo $this->webroot; ?>images/CharliesChopsticks_whoweare.png"
                         style="width:70%;">

                    <div class="clearfix"><p></p></div>
                    <span class="glyphicon  glyphicon-earphone"></span>
                    <span class="text-dark">(905) 388-9888</span><br>
                    <span class="glyphicon  glyphicon-envelope"></span>
                    <a class="secondary-link" href="mailto:order@charlieschopstics.com"><strong>order@charlieschopstics.com</strong></a>

                    <h2 class=""><span class="light">Hours</span></h2>
                    <?php
                        $hours = $this->requestAction('/pages/getHours');
                    ?>
                    <p>Sunday : <strong><?php get_formated_date2($hours['Restaurant']['sunday_from']); ?>
                            to <?php get_formated_date2($hours['Restaurant']['sunday_to']); ?></strong></p>


                    <p>Monday : <strong><?php get_formated_date2($hours['Restaurant']['monday_from']); ?>
                            to <?php get_formated_date2($hours['Restaurant']['monday_to']); ?></strong></p>


                    <p>Tuesday : <strong><?php get_formated_date2($hours['Restaurant']['tuesday_from']); ?>
                            to <?php get_formated_date2($hours['Restaurant']['tuesday_to']); ?></strong></p>


                    <p>Wednesday : <strong><?php get_formated_date2($hours['Restaurant']['wednesday_from']); ?>
                            to <?php get_formated_date2($hours['Restaurant']['wednesday_to']); ?></strong></p>

                    <p>Thursday : <strong><?php get_formated_date2($hours['Restaurant']['thursday_from']); ?>
                            to <?php get_formated_date2($hours['Restaurant']['thursday_to']); ?></strong></p>

                    <p>Friday : <strong><?php get_formated_date2($hours['Restaurant']['friday_from']); ?>
                            to <?php get_formated_date2($hours['Restaurant']['friday_to']); ?></strong></p>

                    <p>Saturday : <strong><?php get_formated_date2($hours['Restaurant']['saturday_from']); ?>
                            to <?php get_formated_date2($hours['Restaurant']['saturday_to']); ?></strong></p>

                </div>
            </div>


            <div class=" col-sm-9">
                <form method="post" action="" validate>
                    <div class="row">
                        <div class="col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label class="text-dark" for="name">Name <span class="warning">*</span></label>
                                <input name="name" type="text" id="name" class="form-control  form-control--contact"
                                       required>
                            </div>
                            <div class="form-group">
                                <label class="text-dark" for="email">E-mail <span class="warning">*</span></label>
                                <input name="email" type="text" id="email"
                                       class="form-control  form-control--contact" required>
                            </div>
                            <div class="form-group">
                                <label class="text-dark" for="subject">Subject <span
                                        class="warning">*</span></label>
                                <input name="subject" type="text" id="subject"
                                       class="form-control  form-control--contact" required>
                            </div>
                                <span class="hidden-xs">Fields marked with <span
                                        class="warning">*</span> are required</span>
                        </div>
                        <div class="col-xs-12  col-sm-8">
                            <div class="form-group">
                                <label class="text-dark" for="message">Message <span
                                        class="warning">*</span></label>
                                    <textarea name="message"
                                              class="form-control  form-control--contact  form-control--big"
                                              id="message" rows="12" style="height:100%;" required></textarea>
                            </div>
                            <div class="right">
                                <button type="submit" class="btn blue">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>

                <hr class="divider divider-about"><center>
                <h2 class="no-margin">Charlie's Locations</h2><br/>
                </center>

                <div class="col-md-6 ">
                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                    <div class="portlet box red">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-spoon"></i>Charlie's Chopsticks Hamilton
                            </div>
                            <div class="tools">

                            </div>
                        </div>
                        <div class="portlet-body">


                            <address>

                                970 Upper James Street<br>
                                Hamilton, ON L9C 3A5<br>
                                (905) 388-9888
                            </address>

                        </div>
                    </div>
                    <!-- END SAMPLE TABLE PORTLET-->
                </div>

                <div class="col-md-6">
                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                    <div class="portlet box red">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-spoon"></i>Charlie's Chopsticks Welland
                            </div>
                            <div class="tools">

                            </div>
                        </div>
                        <div class="portlet-body">

                            <p>
                                20 Thorold Road<br>
                                Welland, ON L3C 3T3<br>
                                (905) 735-9888</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    function get_formated_date2($to_format)
    {
        $arr_hours = explode(':', $to_format);
        if ($arr_hours[0] > 11) {
            if ($arr_hours[0] == 12) {
                echo $arr_hours[0] . ':' . $arr_hours[1] . ' PM';
            } else
                echo ($arr_hours[0] - 12) . ':' . $arr_hours[1] . ' PM';
        } else {
            if ($arr_hours[0] == 00) {
                echo '12' . ':' . $arr_hours[1] . ' AM';
            } else
                echo $arr_hours[0] . ':' . $arr_hours[1] . ' AM';
        }
    }

?>
