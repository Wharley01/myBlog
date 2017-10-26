<header class="w3-container w3-top header w3-black">

    <div class="w3-content w3-row w3-bar">
        <h2 class="w3-text-white w3-left"><span class="w3-text-yellow"><i class="w3-left w3-hide-large w3-hide-medium w3-xxlarge w3-text-white w3-padding fa fa-bars" aria-hidden="true"></i>Dia</span>Blog</h2><span class="w3-left w3-hide-small w3-margin w3-padding">
            <?php
            try{
                $post->categories();
                while($key = $post->categories->fetch_assoc()){
                    if (!$post->sub_categories($key['ID'])){
                        echo "<a href='#' class='w3-text-white w3-bar-item w3-button w3-padding-8 w3-margin'>".$key['CatName']."</a>";
                    }else{
                        echo "<div class=\"w3-dropdown-hover\">";
                        echo "<a class='w3-text-white w3-bar-item w3-button w3-padding-8 w3-margin'>".$key['CatName']." <i class=\"fa fa-caret-down w3-text-white\" aria-hidden=\"true\"></i>
</a>";
                        echo "<div class=\"w3-dropdown-content w3-bar-block w3-card animated fadeIn w3-card-2 w3-round w3-border-0\">";
                        while ($key = $post->sub_categories->fetch_assoc()){

                            echo "<a href=\"#\" class=\"w3-bar-item w3-button w3-hover-light-grey\">".$key['CatName']."</a>";

                        }
                        echo "</div></div>";

                    }

                }
            }catch(Exception $e){
                echo $e->getMessage();
            }


            ?>

        </span> <span class="search-form w3-right w3-margin-top w3-margin-bottom w3-col s6 m3 l3"><input type="text" class="w3-border w3-hide-small w3-round w3-input w3-light-grey" style="width: 100%;" placeholder="Search" style="padding: 4px !important;"></span>
    </div>

</header>