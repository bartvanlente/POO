                <ul id="images">
                    <li>
                        <h2>Title</h2><p>0 Comments 0 Points</p>
                        <img src="blabla">
                        <div class="like"></div>
                        <div class="dislike"></div>
                    </li>
                    <li>
                        <h2>Title</h2><p>0 Comments 0 Points</p>
                        <img src="blabla">
                        <div class="like"></div>
                        <div class="dislike"></div>
                    </li>
                </ul>
                <div id="filter">
                    <div class="title">Filteren</div>
                    <ul>
                        <li>test</li>
                        <li>test1</li>
                        <li>test2</li>
                    </ul>
                </div>

<?php

    print_r($this->data['users']);
    foreach($this->data['users'] as $row) 
    {
        echo $row->firstname;
    }
    
?>