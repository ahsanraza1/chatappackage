<div>
    <nav>
        <div class="navDiv">
            <span wire:click="profile('chat')">{{env("APP_NAME")}}</span>
            

            <style>
                .dropdown {
                    position: relative;
                    display: inline-block;
                }

                .dropdown-content {
                    display: none;
                    position: absolute;
                    background-color: #f9f9f9;
                    min-width: 160px;
                    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                    padding: 12px 16px;
                    z-index: 1;
                    left: -84px;
                }

                .dropdown:hover .dropdown-content {
                    display: block;
                }
            </style>

                <div class="dropdown" wire:click="profile('chatlist')">
                    <i class="fa fa-bars"></i>
                    {{-- <div class="dropdown-content">
                        <ul>
                            <li>
                                <a href="javascript:void()" wire:click="profile('profile')">Profile</a>
                            </li>
                        </ul>
                    </div> --}}
                </div>
        </div>
    </nav>

    <style>
        .navDiv {
            border: 0px solid red;
    display: flex
;
    flex-direction: row;
    justify-content: space-around;
    list-style: none;
        }

    </style>
</div>
