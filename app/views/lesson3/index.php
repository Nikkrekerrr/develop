 <form action="" method="post">
        <input class="" type="text" name="text"><br>
        <button class="btn btn-success m-1" type="submit">send</button><br>

        <?php

        $text = $_POST['text'];

        function mb_strrev($str) {
            $rev = '';
            for ($i = mb_strlen($str); $i >= 0; $i--) {
                $rev .= mb_substr($str,$i,1);
            }

            return $rev;
        }

        echo mb_strrev($text);

        ?>

    </form>