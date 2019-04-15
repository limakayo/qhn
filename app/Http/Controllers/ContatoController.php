<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Http\Requests;

class ContatoController extends Controller
{
    public function cotacao(Request $request) {
        $rules = [
          'nome' => 'required',
          'telefone' => 'required',
          'produto'=> 'required',
          'email' => 'required|email',
          'g-recaptcha-response' => 'required|captcha',
        ];

        $messages = [
          'email' => 'Insira um endereço de e-mail válido.',
          'required' => 'O campo :attribute é obrigatório.'
        ];

        $this->validate($request, $rules, $messages);

        $nome = $request->input('nome');
        $email = $request->input('email');
        $telefone = $request->input('telefone');
        $produto = $request->input('produto');
        $mensagem = $request->input('mensagem');
        $potencia = $request->input('potencia');


        Mail::send('emails.send', [
          'nome' => $nome,
          'email' => $email,
          'telefone' => $telefone,
          'produto' => $produto,
          'potencia' => $potencia,
          'mensagem' => $mensagem
        ], function ($m) use ($nome, $email, $produto) {
            $m->from($email, $nome);
            $m->to('lima.kayo@gmail.com');
            $m->subject('Orçamento do Site - '.$produto);
        });

        return redirect()->back()->with('data', 'Cotação enviada com sucesso! Responderemos em breve!');
    }

    public function contato(Request $request) {
        $rules = [
          'nome' => 'required',
          'telefone' => 'required',
          'mensagem' => 'required',
          'email' => 'required|email',
          'g-recaptcha-response' => 'required|captcha',
        ];

        $messages = [
          'email' => 'Insira um endereço de e-mail válido.',
          'required' => 'O campo :attribute é obrigatório.'
        ];

        $this->validate($request, $rules, $messages);

        $nome = $request->input('nome');
        $email = $request->input('email');
        $telefone = $request->input('telefone');
        $mensagem = $request->input('mensagem');

        Mail::send('emails.contato', [
          'nome' => $nome,
          'email' => $email,
          'telefone' => $telefone,
          'mensagem' => $mensagem
        ], function ($m) use ($nome, $email) {
            $m->from($email, $nome);
            $m->to('lima.kayo@gmail.com');
            $m->subject('Contato do Site');
        });

        return redirect()->back()->with('data', 'Mensagem enviada com sucesso! Responderemos em breve!');
    }
}
