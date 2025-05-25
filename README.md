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
- JS (Puro)

OBS: a escolha de não usar framworks foi para dificultar a criação e entender um pouco melhor do php

---

## 🧪 Como Executar o Projeto

1. Clone este repositório:
git clone https://github.com/krigerofc/project_agendamento.git

2. Localize sua pasta C:\xampp\htdocs e coloque a pasta do projeto lá

3. Inicie o xamp apache e mysql

4. Crie o banco de dados usando o seguinte script ou use o .sql que foi adicionado ao projeto:
```bash
CREATE DATABASE project_agendamentos;
```
```bash
CREATE TABLE appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    start_date DATETIME NOT NULL,
    end_date DATETIME NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    client_name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

6. acesse o link http://localhost/project_agendamento/
