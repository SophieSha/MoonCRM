<div class="d-flex flex-column mx-3 mb-3 bg-white rounded-top">

    <div class="d-flex flex-row shadow-sm justify-content-between rounded-top bg-dark" style="height: 60px;">
        <div class=" my-auto ml-4">
            <h4 class="text-white"><?php echo "{$card['title']}"; ?></h4>
        </div>

        <div class="dropdown my-auto mr-4">
            <i class="fas fa-sort-down fa-2x" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;"></i>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Edit</a>
                <div class="dropdown-divider" href="#"></div>
                <a class="dropdown-item" href="#">Remove</a>
            </div>
        </div>
    </div>

    <div class="d-flex flex-row justify-content-between m-3">

        <div class="w-25"><img data-src="holder.js/200x200" class="img-thumbnail float-left mr-3" alt="200x200" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22200%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20200%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16ab4e13755%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16ab4e13755%22%3E%3Crect%20width%3D%22200%22%20height%3D%22200%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2274.421875%22%20y%3D%22104.396875%22%3E200x200%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="width: 200px; height: 200px;">
        </div>

        <div class="w-25">
            <h6>Description</h6>
            <p><?php echo "{$card['description']}" ?></p>
        </div>

        <!-- CHECKBOX AND SUBMIT SECTION -->
        <div class="w-25 justify-content-between">

            <form method="POST" class="h-100">
            
                 <div class="d-flex flex-row flex-fill h-100">

                    
                    <div class="d-flex flex-column flex-fill h-100">

                        <h6 class="mb-2">Visible To</h6>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="selected[]" id="" value="sales" <?php if (isset($_POST['selected']) and array_search("sales", $_POST['selected']) !== false) {
    echo "checked";
} ?>>
                                Sales
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="selected[]" id="" value="marketing" <?php if (isset($_POST['selected']) and array_search("marketing", $_POST['selected']) !== false) {
    echo "checked";
} ?>>
                                Marketing
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="selected[]" id="" value="finance" <?php if (isset($_POST['selected']) and array_search("finance", $_POST['selected']) !== false) {
    echo "checked";
} ?>>
                                Finance
                            </label>
                        </div>

                    </div>

                    <div class="d-flex flex-column flex-fill h-100">
                        <div class=""></div>
                        <button class="btn btn-dark text-white align-self-end mt-auto mr-4 mb-4" type="submit" style="height: 3rem; width: 6rem;">Save</button>
                    </div>
                    
                </div>
            
            </form>

        </div>
        <!-- CHECKBOX AND SUBMIT SECTION-->
    </div>
</div>

    <!-- 
        The below codes checks to see if any checkboxes have been selected.
        Selection is determined using boolean values [0 for not selected and 1 for selected]
        These values are then parsed into an SQL update statement
        SQL statement is then sent to the sever and executed
     -->
    <?php
    if (isset($_POST['selected'])) {
        $selected_options = $_POST['selected'];

        $financeSet = 0;
        $salesSet = 0;
        $marketingSet = 0;

        if (array_search("sales", $selected_options) !== false) {
            $salesSet = 1;
        } else {
            $salesSet = 0;
        }

        if (array_search("marketing", $selected_options) !== false) {
            $marketingSet = 1;
        } else {
            $marketingSet = 0;
        }

        if (array_search("finance", $selected_options) !== false) {
            $financeSet = 1;
        } else {
            $financeSet = 0;
        }

        $sql2 = "UPDATE card SET isFinance=$financeSet,isSales=$salesSet, isMarketing=$marketingSet WHERE card_id=1";
        $link->query($sql2);
    } else {
            $sql2 = "UPDATE card SET isFinance=0,isSales=0, isMarketing=0 WHERE card_id=1";
            $link->query($sql2);
        }
    ?>