
# PhotosApp

Bem-vindo ao **PhotosApp**. Website inspirado no Instagram.

Welcome to **PhotosApp**. Instagram-inspired website.

## Instalação / Installation

### Instale as dependências / Install dependencies

    npm install

### Crie o banco de dados / Create the database

O arquivo do banco de dados, denominado **database.mwb**, está localizado na pasta raiz. Você pode executar também o código SQL de **database.sql**.

The database file, called **database.mwb**, is located in the root folder. You can also execute the SQL code from **database.sql**.

### Conecte o banco de dados / Connect the database

Vá para **Service/Settings.php** para configurar os dados do seu banco de dados.

Go to **Service/Settings.php** to set the info for your database.
  
## Tradução / Translation

### Adicionando novo idioma / Adding new langugage

Para adicionar um novo idioma vá para **Service/Language**, copie um idioma já existente e renomeie o arquivo e a classe com o nome do idioma que deseja. Defina o primerio item da constante STRINGS, acronym, com a sigla do idioma, para que seja reconhecida automaticamente pelo sistema ao entrar no site pela primeira vez.

To add a new language go to **Service/Language**, copy an existing language and rename the file and its class with the name of the language you want. Define the first item of the STRINGS constant, acronym, with the acronym of the language, so that it is automatically recognized by the system when entering the site for the first time.

### Chamando a string / Getting the string

**PHP:**
Sem imprimir / Getting:

    \Service\Translation::get('stringGroup.stringName');
    
Imprimindo / Echoing:

    \Service\Translation::echo('stringGroup.stringName');
**JAVASCRIPT:**

    language.stringGroup.stringName

