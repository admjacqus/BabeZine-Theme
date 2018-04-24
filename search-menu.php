<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <label>
            <input type="search" class="search-field" 
            placeholder=""
            value="<?php echo get_search_query() ?>" name="s"
            title=""/>
    </label>
        <button type="submit" class="search-submit" id="search-submit">
            <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 174.4 174.4"><title>search</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path d="M129,106.8a68.92,68.92,0,0,0,10.6-37,69.8,69.8,0,1,0-69.8,69.8,68.92,68.92,0,0,0,37-10.6l40.6,40.8a15.84,15.84,0,0,0,22.4-22.4ZM69.8,123.6a53.8,53.8,0,1,1,53.8-53.8A53.95,53.95,0,0,1,69.8,123.6Z"/></g></g></svg>
        </button>
</form>
