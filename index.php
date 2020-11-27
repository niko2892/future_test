<?php

include $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';

?>
    <section class="comments">
    <?php 
    foreach ($data as $key) { ?>
        <div class="container">
            <div class="comments__message">
                <div class="comments__message_header">
                    <div class="comments__message_author"><?= $key["user_name"] ?></div>
                    <div class="comments__message_time"><?= $key["message_time"] ?></div>
                    <div class="comments__message_date"><?= $key["message_date"] ?></div>
                </div>
                <div class="comments__message_text"><?= $key["text_comment"] ?></div>
            </div>
        </div>
    <?php } ?>
    </section>

    <section class="post">
        <div class="container">
            <div class="post__line"></div>
            <p2 class="post__header">Оставить комментарий</p2>
            <form name="comment" action="/" method="post">
                  <div class="post__author">Ваше имя:</div>
                  <input class="post__author_input" type="text" name="author_name"/>
                
                  <div class="post__comment">Ваш комментарий</div>
                  <textarea class="post__comment_input" name="text_comment" id="" cols="30" rows="10"></textarea>

                  <div class="post__submit">
                      <input name="enter" class="post__submit_btn" type="submit" value="Отправить" />
                  </div>
            </form>
        </div>
    </section>

<?php

include $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';