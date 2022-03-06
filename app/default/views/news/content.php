
    <style>
    </style>

<section  id='news-content'  class="d-flex align-items-center mt-0 pt-0" style="flex-direction:column; width: 90%;">
    <div class="col d-flex align-items-center" style="flex-direction:column; background-color:white;" >
        <div class="row d-flex justify-content-center  my-5 py-5" style="width:80%;" >
            <div class="col-11" style="color:var(--color1)">
                <h1><?php echo($this->title) ?></h1>
                <span><?php echo($this->date) ?></span>
            </div>
        </div>
        <div class="row d-flex justify-content-center" style="width:80%;">
            <div class="col-12" >
                <?php
                    include "public/posts/".$this->content.".html";
                ?>
            </div>
        </div>
    </div>
</section>
