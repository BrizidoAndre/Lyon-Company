# Lyon Company - Aplicação de Gerenciamento

## 🏢 Aplicação MVC para Gerenciamento de Empresas (Yii2 Framework)

O **Lyon Company** é uma aplicação web desenvolvida utilizando o *framework* **Yii2** (PHP), seguindo o padrão de arquitetura **Model-View-Controller (MVC)**. O projeto é focado no gerenciamento de dados relacionados a uma empresa, como endereços, benefícios, descontos, documentos e informações de funcionários.

### ✨ Funcionalidades e Estrutura (Foco em Models e Controllers)

A estrutura do projeto, baseada no Yii2 Basic Project Template, é enriquecida com diversos *models* e *controllers* que definem a funcionalidade da aplicação:

#### 1. Controllers (Lógica de Negócio e Fluxo)

Os *controllers* gerenciam as requisições do usuário e coordenam a interação entre os *models* e as *views*. A presença de múltiplos *controllers* indica um sistema modular e bem definido:

| Controller | Funcionalidade Principal |
| :--- | :--- |
| `AddressesController.php` | Gerencia operações CRUD (Criar, Ler, Atualizar, Deletar) para **Endereços**. |
| `BenefitsController.php` | Gerencia operações CRUD para **Benefícios** oferecidos pela empresa. |
| `DiscountsController.php` | Gerencia operações CRUD para **Descontos** aplicáveis. |
| `DocumentsController.php` | Gerencia operações CRUD para **Documentos** (tipos e registros). |
| `EmployeesController.php` | Gerencia operações CRUD para **Funcionários**. |
| `PeopleController.php` | Gerencia operações CRUD para **Pessoas** (entidade base). |
| `PersonBenefitsController.php` | Gerencia a associação entre **Pessoas** e **Benefícios**. |
| `SiteController.php` | Controlador padrão para páginas estáticas (Home, Contato, Login/Logout). |

#### 2. Models (Estrutura de Dados e Regras)

Os *models* representam as tabelas do banco de dados e contêm a lógica de validação e manipulação de dados. A variedade de *models* confirma a complexidade do domínio da aplicação:

| Model | Representação de Dados | Model Search |
| :--- | :--- | :--- |
| `Addresses.php` | Endereços | `AddressesSearch.php` |
| `Benefits.php` | Benefícios | `BenefitsSearch.php` |
| `Cities.php` | Cidades | - |
| `DiscountTypes.php` | Tipos de Desconto | - |
| `Discounts.php` | Descontos | `DiscountsSearch.php` |
| `DocumentTypes.php` | Tipos de Documento | - |
| `Documents.php` | Documentos | `DocumentsSearch.php` |
| `Employees.php` | Funcionários | `EmployeesSearch.php` |
| `People.php` | Pessoas | `PeopleSearch.php` |
| `PersonBenefits.php` | Relação Pessoa-Benefício | - |

### 🛠️ Tecnologias Utilizadas

*   **PHP:** Linguagem de programação principal.
*   **Yii2 Framework:** Framework MVC para estruturação da aplicação.
*   **Banco de Dados:** Requer configuração de banco de dados (MySQL ou similar) para persistência dos dados.
*   **JavaScript, HTML, SCSS, CSS:** Utilizados para a camada de visualização (*views*).

### 📂 Estrutura do Projeto

O projeto segue a estrutura padrão do Yii2:

```
Lyon-Company/
├── assets/         # Definições de Assets (JS, CSS)
├── commands/       # Comandos de Console
├── config/         # Configurações da Aplicação (db.php, web.php, etc.)
├── controllers/    # Controladores da Aplicação (Lógica de Negócio)
├── mail/           # Layouts de E-mail
├── models/         # Modelos de Dados (Estrutura e Regras)
├── runtime/        # Arquivos gerados em tempo de execução
├── tests/          # Testes (Codeception)
├── views/          # Arquivos de Visualização (Views)
├── web/            # Ponto de entrada da aplicação (index.php)
└── ...             # Outros arquivos de configuração (composer.json, Vagrantfile)
```

### 🚀 Como Executar

O projeto requer um ambiente de servidor web com PHP e um banco de dados.

1.  **Instalação de Dependências:**
    ```bash
    composer install
    ```
2.  **Configuração do Banco de Dados:**
    Edite o arquivo `config/db.php` com as credenciais do seu banco de dados.
3.  **Acesso:**
    A aplicação pode ser acessada através do servidor web configurado (ex: `http://localhost/lyon-company/web/`).

### 📝 Licença

Este projeto está sob a licença [BSD-3-Clause](https://opensource.org/licenses/BSD-3-Clause).

---
*Desenvolvido por [BrizidoAndre](https://github.com/BrizidoAndre)*
