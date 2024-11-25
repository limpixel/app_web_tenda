<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Incoming\Answer;
use App\Conversations\DateTimeConversation; // Pastikan file ini ada di folder App/Conversations

class BotmanController extends Controller
{
    protected $bot;

    /**
     * Handle the incoming BotMan request.
     */
    public function handle()
    {
        $this->bot = app('botman'); // Inisialisasi BotMan

        // Menu utama
        $this->bot->hears('halo|mulai|start', function (BotMan $bot) {
            $this->askService($bot);
        });

        $this->bot->hears('service', function (BotMan $bot) {
            $this->askService($bot); // Memanggil fungsi askService
        });

        $this->bot->listen();
    }

    

    public function askService(BotMan $bot)
    {
        $services = [
            "1" => "WhatsApp",
            "2" => "Facebook",
            "3" => "Gmail"
        ];

        // Buat array tombol
        $buttonArray = [];
        foreach ($services as $id => $value) {
            $buttonArray[] = Button::create($value)->value($id);
        }

        // Buat pertanyaan dengan tombol
        $question = Question::create('Hi, Welcome to our Services!  
What kind of service are you looking for?')
            ->callbackId('select_service')
            ->addButtons($buttonArray);

        // Ajukan pertanyaan kepada pengguna
        $bot->ask($question, function (Answer $answer) use ($bot) {
            if ($answer->isInteractiveMessageReply()) {
                // Simpan layanan yang dipilih pengguna
                $selectedService = $answer->getValue();
                $bot->userStorage()->save([
                    'service' => $selectedService,
                ]);

                // Berikan respons ke pengguna
                $bot->reply('Thank you! You selected: ' . $selectedService);

                // Mulai percakapan lain (opsional)
                // $bot->startConversation(new NextConversation());
            } else {
                // Tanggapi jika pengguna tidak memilih tombol
                $bot->reply('Please select one of the provided options.');
            }
        });
    }

}
