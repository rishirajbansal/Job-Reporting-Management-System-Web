                                        <fieldset style="min-height: 380px">

                                            <legend></legend>
                                            
                                            <?php
                                            $userOrgInputs = new UserOrgInputs();
                                            $userOrgDao = new UserOrgDao();
                                            $userOrgInputs->setIdorgs($orgId);
                                            
                                            $loadFlag = $userOrgDao->fetchReportDynaDetails($userOrgInputs);
                                            if ($loadFlag){
                                                $userEntities = $userOrgDao->getAllUserEntities();
                                                ?>
                                            
                                                <div style="min-height: 240px">
                                                    <?php
                                                    //$userEntities = $userOrgDao->getUserEntities();
                                                    foreach ($userEntities as $userEntity){ 
                                                        $htmltype = $userEntity->getHtmlType();
                                                        //$htmltype = substr($htmltype, strlen(DYNAFILE_CONTROLTYPE));
                                                        ?>

                                                        <div class="form-group" <?php if ($htmltype === DYNA_CONTROL_TYPE_IMAGE) {?> style="margin-bottom: 0px" <?php } ?> >
                                                            
                                                            <div class="col-md-12">

                                                                <?php
                                                                 switch ($htmltype) {
                                                                    case DYNA_CONTROL_TYPE_TEXT:
                                                                        ?>
                                                                        <label class="control-label" style="margin-bottom: 7px;font-weight: bold;"><?php echo $userEntity->getNameEn(); ?></label>
                                                                        <div class="input-group input-group-md">
                                                                            <span class="input-group-addon" style="border: 0px; background-color: #FFF; padding-left: 0px;"></span>
                                                                            <input class="form-control" type="text" placeholder="<?php echo $userEntity->getNameEn(); ?>" name="<?php echo $userEntity->getHtmlName(); ?>" id="<?php echo $userEntity->getHtmlName(); ?>" value="">
                                                                        </div>
                                                                        <?php
                                                                        break;

                                                                    case DYNA_CONTROL_TYPE_TEXTAREA:
                                                                        ?>
                                                                        <label class="control-label" style="margin-bottom: 7px;font-weight: bold"><?php echo $userEntity->getNameEn(); ?></label>
                                                                        <textarea class="form-control" placeholder="<?php echo $userEntity->getNameEn(); ?>" name="<?php echo $userEntity->getHtmlName(); ?>" id="<?php echo $userEntity->getHtmlName(); ?>" rows="4" ></textarea>
                                                                        <?php
                                                                        break;

                                                                    case DYNA_CONTROL_TYPE_CHECKBOX:
                                                                        ?>
                                                                        <label class="col-md-12" style="margin-left: -25px;">
                                                                            <input class="checkbox style-0" type="checkbox" name="<?php echo $userEntity->getHtmlName(); ?>" id="<?php echo $userEntity->getHtmlName(); ?>" value="Yes" >
                                                                            <span class="col-md-12"><?php echo $userEntity->getNameEn(); ?></span>
                                                                        </label>
                                                                        <?php
                                                                        break;

                                                                    case DYNA_CONTROL_TYPE_COMBO:
                                                                        ?>
                                                                        <label class="control-label" style="margin-bottom: 7px;font-weight: bold"><?php echo $userEntity->getNameEn(); ?></label>
                                                                        <select class="form-control" name="<?php echo $userEntity->getHtmlName(); ?>" id="<?php echo $userEntity->getHtmlName(); ?>">
                                                                            <?php
                                                                            $listValues = $userEntity->getSelectedListValuesEn();
                                                                            foreach ($listValues as $value){ ?>
                                                                                <option ><?php echo $value; ?></option>
                                                                            <?php
                                                                            }
                                                                            ?> 
                                                                        </select>
                                                                        <?php
                                                                        break;

                                                                    case DYNA_CONTROL_TYPE_DATE:
                                                                        ?>
                                                                        <label class="control-label" style="margin-bottom: 7px;font-weight: bold"><?php echo $userEntity->getNameEn(); ?></label>
                                                                        <div class="input-group input-group-md" >
                                                                            <span class="input-group-addon" style="border: 0px; background-color: #FFF; padding-left: 0px;"></span>
                                                                            <input class="form-control datepicker" type="text" placeholder="<?php echo $userEntity->getNameEn(); ?>" name="<?php echo $userEntity->getHtmlName(); ?>" id="<?php echo $userEntity->getHtmlName(); ?>" value="" data-dateformat="dd/mm/yy">
                                                                        </div>
                                                                        <?php
                                                                        break;

                                                                    case DYNA_CONTROL_TYPE_TIME:
                                                                        ?>
                                                                        <label class="control-label" style="margin-bottom: 7px;font-weight: bold"><?php echo $userEntity->getNameEn(); ?></label>
                                                                        <div class="input-group input-group-md" >
                                                                            <span class="input-group-addon" style="border: 0px; background-color: #FFF; padding-left: 0px;"></span>
                                                                            <input class="form-control" type="text" placeholder="<?php echo $userEntity->getNameEn(); ?>" name="<?php echo $userEntity->getHtmlName(); ?>" id="<?php echo $userEntity->getHtmlName(); ?>" value="" onclick="javascript:jtime('<?php echo $userEntity->getHtmlName(); ?>');">
                                                                        </div>
                                                                        <?php
                                                                        break;

                                                                    case DYNA_CONTROL_TYPE_DYNAMIC_TEXTBOXES_2:
                                                                        ?>
                                                                        <label class="control-label" style="margin-bottom: 7px;font-weight: bold"><?php echo $userEntity->getNameEn(); ?></label>
                                                                        <div id="2TB">
                                                                            <div id="inner2TB">
                                                                                <div class="col-md-5" style="padding-left: 0px;">
                                                                                    <div class="input-group input-group-md" style="width:100%">
                                                                                        <input class="form-control cstValid" type="text" placeholder="" name="" id="" value="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-5" style="padding-right: 0px;">
                                                                                    <div class="input-group input-group-md" style="width:100%">
                                                                                        <input class="form-control cstValid" type="text" placeholder="" name="" id="" value="">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <?php
                                                                        break;

                                                                    case DYNA_CONTROL_TYPE_IMAGE:
                                                                        ?>
                                                                        <input type="hidden" name="<?php echo $userEntity->getHtmlName(); ?>" id="<?php echo $userEntity->getHtmlName(); ?>" value=""/>
                                                                        <?php
                                                                        break;
                                                                    
                                                                    case DYNA_CONTROL_TYPE_SIGNPAD:
                                                                        ?>
                                                                        <input type="hidden" name="<?php echo $userEntity->getHtmlName(); ?>" id="<?php echo $userEntity->getHtmlName(); ?>" value=""/>
                                                                        <?php
                                                                        break;

                                                                    default:
                                                                        break;
                                                                 }
                                                                ?>

                                                            </div>
                                                        </div>

                                                    <?php

                                                    }

                                                    ?>
                                                </div>
                                            
                                            <?php
                                            }
                                            else{ ?>
                                                <div class="alert alert-warning fade in">
                                                    <i class="fa-fw fa fa-warning"></i>
                                                    <?php echo getLocaleText('RPT_STRUCT_PREV_DYNA_COMPS_MSG_1', TXT_A); ?>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                            
                                            <br/>

                                        </fieldset>