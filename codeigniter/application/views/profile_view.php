<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en' lang='en'>
<link type="text/css" href="http://staging.athletescentral.com/css/buttons.css" rel="stylesheet">
<title>{user_name} {separator} {profile_title}</title>
</head>
<body>
    <div id="content">
        <div class="header"><a href="{home_url}"><h1>{home_header_text}</h1></a> </div>
        <div class="line"></div>
        <div class="col_control_panel">    
            <div class="control_panel_header"><a href="{profile_url}">{profile_name}</a></div>    
            <div class="default_pic"><a href="{default_picture_view}"><img src="{default_pic_src}"></a></div>             
            <div class="homepanel">
                <div class="control_panel_view">        
                    <div class="control_panel_header">{user_control_panel}</div>                
                    <ul>
                        <li><a class="cp_button" href="link1">link1 text</a></li> 
                        <li><a class="cp_button" href="link2">link2 text</a></li> 
                        <li><a class="cp_button" href="link3">link3 text</a></li> 
                        <li><a class="cp_button" href="link4">link4 text</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <h3>{wall_heading}</h3>
        {wall_entries}
        <h5>{user_name}</h5>
        <div class="wall_entries_body">{body}</div>
        {/wall_entries}
    </div>
</body>
</html>