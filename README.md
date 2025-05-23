# 📅 Sistema de Agendamentos
![image](https://github.com/user-attachments/assets/5ca8b8ae-9b12-4a55-b8ef-3aa0a97d97d9)

Um sistema simples de agendamentos desenvolvido em PHP com MySQL, utilizando o padrão MVC. Permite criar, listar, editar e excluir compromissos de forma prática.

---

## 🚀 Funcionalidades

- ✅ Listar todos os agendamentos
- 🆕 Criar novos agendamentos
- 📝 Editar agendamentos existentes
- ❌ Excluir agendamentos
- ⏱️ Separação entre compromissos futuros e passados

---

## 🛠️ Tecnologias Utilizadas

- PHP (sem frameworks)
- MySQL
- HTML/CSS

---

## 🧪 Como Executar o Projeto

1. Clone este repositório:
git clone https://github.com/seu-usuario/seu-repositorio.git

2. Localize sua pasta C:\xampp\htdocs e coloque a pasta do projeto lá

3. Inicie o xamp apache e mysql

4. crie um banco de dados chamado project_agendamentos, caso tenha senha em seu banco ou portas diferentes é configuravel na pasta config

5. utilize o seguinte comando para criar seu DB!

```bash
CREATE TABLE appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    data_inicial DATETIME NOT NULL,
    data_final DATETIME NOT NULL,
    titulo VARCHAR(255) NOT NULL,
    descricao TEXT,
    nome_cliente VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```
