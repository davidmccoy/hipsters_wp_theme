<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div>
        <i class="fa fa-search" aria-hidden="true" onclick="document.getElementById('searchform').submit();"></i>
        <input type="text" value="" placeholder="Search" name="s" id="s" contenteditable="true" autocomplete="off"/>
        <input type="submit" id="searchsubmit" value="Search" />
    </div>
</form>
