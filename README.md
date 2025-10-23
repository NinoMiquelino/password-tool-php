## 👨‍💻 Autor

<div align="center">
  <img src="https://avatars.githubusercontent.com/ninomiquelino" width="100" height="100" style="border-radius: 50%">
  <br>
  <strong>Onivaldo Miquelino</strong>
  <br>
  <a href="https://github.com/ninomiquelino">@ninomiquelino</a>
</div>

---

# 🔐 Secure Pass: PHP & Zxcvbn Password Analyzer

![Made with PHP](https://img.shields.io/badge/PHP-777BB4?logo=php&logoColor=white)
![Frontend JavaScript](https://img.shields.io/badge/Frontend-JavaScript-F7DF1E?logo=javascript&logoColor=black)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-38B2AC?logo=tailwindcss&logoColor=white)
![License MIT](https://img.shields.io/badge/License-MIT-green)
![Status Stable](https://img.shields.io/badge/Status-Stable-success)
![Version 1.0.0](https://img.shields.io/badge/Version-1.0.0-blue)
![GitHub stars](https://img.shields.io/github/stars/NinoMiquelino/password-tool-php?style=social)
![GitHub forks](https://img.shields.io/github/forks/NinoMiquelino/password-tool-php?style=social)
![GitHub issues](https://img.shields.io/github/issues/NinoMiquelino/password-tool-php)

Este projeto é uma ferramenta full-stack que permite aos usuários gerar senhas fortes e avaliar a segurança de senhas existentes. O coração do sistema é o algoritmo **Zxcvbn** (uma adaptação do algoritmo do Dropbox), que fornece uma pontuação precisa e feedback construtivo sobre a força de qualquer senha.

---

## 🌟 Recursos Principais

* **Geração de Senha Segura:** Backend PHP gera senhas fortes, criptograficamente aleatórias (`random_int`), baseadas nos parâmetros do usuário (tamanho, inclusão de números/símbolos).
* **Análise de Força (Zxcvbn):** Utiliza o `bjeavons/zxcvbn-php` para fornecer uma pontuação de 0 a 4, tempo estimado de quebra (crack time) e sugestões de melhoria.
* **Frontend Interativo:** Interface de usuário construída com **Tailwind CSS** com feedback visual dinâmico (barra de progresso, cores de pontuação).
* **Arquitetura Cliente-Servidor:** Demonstra a forma correta de realizar operações de segurança no lado do servidor.

---

## 🧠 Tecnologias utilizadas

* **Backend:** PHP 7.4+
    * `bjeavons/zxcvbn-php` (Algoritmo de validação de força)
    * Composer (Gerenciador de dependências)
* **Frontend:** HTML5 e JavaScript Vanilla
* **Estilização:** Tailwind CSS (via CDN)

--- 

## ⚙️ Configuração e Instalação

### Pré-requisitos

1.  Um ambiente de servidor web com PHP.
2.  **Composer** instalado globalmente.

### 1. Clonar o Repositório

```bash
git clone https://github.com/ninomiquelino/password-tool-php.git
```

2. Instalar a Dependência PHP
​Navegue até a pasta src/ e use o Composer:

```bash
cd src/
composer install
cd .. # Voltar para a raiz do projeto
```

3. Executar o Servidor
​Utilize o servidor embutido do PHP para testes (a partir da raiz do projeto):

```bash
php -S localhost:8001
```

​• Acesse: O frontend estará disponível em http://localhost:8001/public/index.html.
​4. Configurar o Endpoint da API
​Certifique-se de que a constante API_URL no arquivo public/index.html aponte corretamente para o seu backend:

```bash
// public/index.html
const API_URL = 'http://localhost:8001/src/api.php'; 
```
---

📝 Instruções de Uso

​O projeto está dividido em duas abas:
​1. Gerador de Senha
​Selecione o comprimento desejado (entre 8 e 32) e as opções de inclusão de caracteres.
​Clique em Gerar Senha. O PHP criará a senha e a retornará.
​Use o botão Copiar para salvar a senha gerada na área de transferência.
​2. Validador de Força
​Clique na aba Validador de Força.
​Digite uma senha no campo. A análise será acionada automaticamente após um pequeno atraso.
​Análise de Resultado:
​Pontuação (0-4): Exibe a força geral.
​Tempo de Quebra: Estima quanto tempo levaria para quebrar a senha (usando um ataque limitado a 100 tentativas por hora).
​Dicas de Melhoria: Fornece feedback específico (ex: "adicione mais palavras", "use caracteres especiais").
​<br>
🛑 Segurança (Backend vs. Frontend)
​É crucial que a lógica de validação de segurança de senhas (como o Zxcvbn) seja executada no backend. Se a validação fosse feita apenas no JavaScript (frontend), um atacante poderia facilmente ignorar as regras de segurança, ou o código poderia ser comprometido.
​Neste projeto, o JavaScript lida apenas com a interface e a comunicação, garantindo que todas as decisões de segurança sejam feitas no PHP.

---

## 🤝 Contribuições
Contribuições são sempre bem-vindas!  
Sinta-se à vontade para abrir uma [*issue*](https://github.com/NinoMiquelino/password-tool-php/issues) com sugestões ou enviar um [*pull request*](https://github.com/NinoMiquelino/password-tool-php/pulls) com melhorias.

---

## 💬 Contato
📧 [Entre em contato pelo LinkedIn](https://www.linkedin.com/in/onivaldomiquelino/)  
💻 Desenvolvido por **Onivaldo Miquelino**

---
