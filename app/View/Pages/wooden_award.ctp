<?php
$this->Html->css('jquery.bxslider', array('inline' => false));
$this->Html->css('/files/fancybox/jquery.fancybox', array('inline' => false));
$this->Html->script('jquery.bxslider.min', array('inline' => false));
$this->Html->script('jquery.accordion', array('inline' => false));
//$this->Html->script('jquery.easing.1.3', array('inline' => false));
$this->Html->script('award', array('inline' => false));
$this->Html->script('/files/fancybox/jquery.fancybox', array('inline' => false));
?>


<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page_titles">
                <span>John R.</span>
                <h1 class="award">Wooden Award</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="award_text">
                <?php echo $this->Html->image('award.png', array('alt' => 'The Los Angeles Athletes Club trophy', 'class'=>'img-responsive float_left')); ?>
                <?php echo $this->Bambla->fetchSection(1); ?>
            </div>
        </div>
    </div>
    <?php if(!empty($quotes)) : ?>
        <div class="row">
            <div class="col-xs-12">
                <div class="full facts">
                    <?php echo $this->Html->image('line_stipes.jpg', array('class' => 'line_top')); ?>
                    <div class="text center">
                        <h2>Award Facts</h2>
                        <?php echo $this->Html->image('decoration_quotes.png', array('alt' => 'separator')); ?>
                        <ul class="award_facts">
                            <?php foreach($quotes as $quote) : ?>
                                <li><p>"<?php echo $quote['Quote']['info']; ?>"</p></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php echo $this->Html->image('line_stipes.jpg', array('class' => 'line_bottom')); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-xs-12">
            <?php if(!empty($photos)) : ?>
                <div class="award_photos_container">
                    <div class="row">
                        <?php foreach($photos as $photo) : ?>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="award_img">
                                    <?php echo $this->Html->link($this->Html->image("uploads/".$photo['AwardPhoto']['image_thumb'], array("alt" => $photo['AwardPhoto']['name'], 'class' => 'img-responsive')),'/img/uploads/'.$photo['AwardPhoto']['image_large'], array('class' => 'fancybox ', 'data-fancybox-group' => 'gallery', 'escape' => false)); ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
	<?php if(!empty($winners)) : ?>
        <div class="row">
            <div class="col-xs-12">
                <div class="award_text center">
                    <h2>Winners List</h2>
                    <?php echo $this->Bambla->fetchSection(2); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div id="st-accordion" class="st-accordion">
                    <ul>
                        <?php foreach($winners as $winner_category) : ?>
                        <li>
                            <a href="javascript:void(0)"><span class="st-arrow"></span><?php echo $winner_category['WinnerCategory']['name']; ?>s Winners</a>
                            <div class="st-content table-responsive">
                                <table cellpadding="0" cellspacing="0" class="table_header table">
                                    <tr>
                                        <th width="25%" style="text-align:center!important;">Year</th>
                                        <th width="40%">Player</th>
                                        <th>School</th>
                                    </tr>
                                </table>
                                <table cellpadding="0" cellspacing="0" class="table_bg table">
                                    <?php foreach($winner_category['Winner'] as $winner) : ?>
                                        <tr>
                                            <td width="25%" class="center"><?php echo $winner['year']; ?></td>
                                            <td width="40%"><?php echo $winner['name']; ?></td>
                                            <td><?php echo $winner['school']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
	<?php endif; ?>
</div>
