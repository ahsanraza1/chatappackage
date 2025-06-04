<?php

namespace Ahsanraza1\Builtinchat;
use Ahsanraza1\Builtinchat\Console\InstallBuiltInChat;
use Livewire\Livewire;
use Illuminate\Support\ServiceProvider;

class BuiltInChatServiceProvider extends ServiceProvider
{
    public function boot(){
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views','builtinchat');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        Livewire::component('chat', \Ahsanraza1\Builtinchat\Livewire\Chat::class);
        Livewire::component('ChatList', \Ahsanraza1\Builtinchat\Livewire\ChatList::class);
        Livewire::component('ChatSearch', \Ahsanraza1\Builtinchat\Livewire\ChatSearch::class);
        Livewire::component('ChatView', \Ahsanraza1\Builtinchat\Livewire\ChatView::class);
        Livewire::component('ChatViewHeader', \Ahsanraza1\Builtinchat\Livewire\ChatViewHeader::class);
        Livewire::component('EventsComponent', \Ahsanraza1\Builtinchat\Livewire\EventsComponent::class);
        Livewire::component('Header', \Ahsanraza1\Builtinchat\Livewire\Header::class);
        Livewire::component('MessageBox', \Ahsanraza1\Builtinchat\Livewire\MessageBox::class);
        Livewire::component('MessageList', \Ahsanraza1\Builtinchat\Livewire\MessageList::class);
        Livewire::component('Messenger', \Ahsanraza1\Builtinchat\Livewire\Messenger::class);
        Livewire::component('profile', \Ahsanraza1\Builtinchat\Livewire\Profile::class);

        $this->publishes([
            __DIR__.'/database/seeders' => database_path('seeders'),
        ], 'builtinchat-seeders');

        $this->publishes([
            __DIR__.'/database/migrations' =>database_path('migrations')], 'builtinchat-migrations'
        );

    }

     public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallBuiltInChat::class,
            ]);
        }
    }
}