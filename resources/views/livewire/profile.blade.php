<div>
    <div style="padding: 2px 30px;">
        <span>
            <img class="" src="{{ asset($current_image) }}" style="width:55px; height:55px; border-radius:50%; border:2px solid #06D">
            <span onclick="document.getElementById('profileimagefield').click()" style="position: relative; top: -13px; left:-15px; color:green">
                <i class="fa fa-image"></i>
            </span>
            <input type="file" id="profileimagefield" name="profileimage" accept="image/*" style="display:none"  wire:model="image">
        </span>
        <span style="font-size: larger;
    font-weight: bold;">
            {{ $user->name }}
        </span>
    </div>
</div>
