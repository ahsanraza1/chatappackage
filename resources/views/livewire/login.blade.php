<div class="wrapper">
    <div class="container-fluid">
        <form wire:submit="login" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" class="form-control" wire:model="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control" wire:model="password">
            </div>
            <input type="submit" class="form-control">
            @if (session()->has('danger_message'))
                <div class="alert alert-success">
                    {{ session('danger_message') }}
                </div>
            @endif
        </form>
    </div>
    <style>
        .wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* full viewport height */
        }
        .container-fluid {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        form {
            display: flex;
            /* border: 1px solid red; */
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
    </style>
</div>
