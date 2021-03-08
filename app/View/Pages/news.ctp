<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page_titles">
                <span>Coach</span>
                <h1 class="speaks">In the News</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <br><br>
                <div style="margin-left:25px;">
                    <?php echo $this->Html->link('<span class="icon-arrow-left"></span> Back', array('controller' => 'Pages', 'action' => 'home'),array('class'=>'btns','escape'=>false)); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="article_listings">
    <?php if(!empty($news)) : ?>
        <ul class="article_list">
            <?php foreach($news as $news) : ?>
                <li>
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <p><?php echo $this->Time->format('m.d.y', $news['News']['date']); ?></p>
                                <div class="article_title"><?php echo $this->Html->link($news['News']['title'], $news['News']['link'], array('target' =>'_blank')); ?></div>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>
