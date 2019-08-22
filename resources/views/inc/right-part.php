<div class="get_our_media_kit-side" style="position: relative; top: 0px;">
    <h2>
        Get Our Infopack
    </h2>
    <p class="small">
        Best quick guide to start working with us.
    </p>
    <form name="subscribe"  id="media-kit-form">
        <input class="input"  id="email" name ="email" placeholder="Enter your Email" required tabindex="1" type="email">
        <button class="button button-blue button_big  " onclick="_ga('send', 'Infopack', 'Get_infopack')" id ="submit" tabindex="2"
            type="submit" value="SEND ME THE KIT!">SEND ME THE KIT!</button>
    </form>
    <br/>


    <!-- <form id="media-kit-form">
        <input  id="email" name ="email" class="input" placeholder="Enter your Email" required="" tabindex="1" type="email">
        <input class="button button-blue button_big" onclick="_ga('send', 'Infopack', 'Get_infopack')" tabindex="2" type="submit" id ="submit" value="SEND ME THE KIT!">
        <input type="hidden" name="_token" id="token" value="{!!csrf_token()!!}">
    </form> -->
    <span id="res_msg" class="alert"></span>
</div>
