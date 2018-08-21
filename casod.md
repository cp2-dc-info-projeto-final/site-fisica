# Especificações de Casos de Usos

# Sumário
- [CDU 01 - Cadastro](#cdu-01---cadastro)
- [CDU 02 - Autenticar](#cdu-02---autenticar)
- [CDU 03 - Visualizar Links](#cdu-03---visualizar-links)
- [CDU 04 - Visualizar Arquivos](#cdu-04---Visualizar-arquivos)
- [CDU 05 - Pesquisar Duvidas](#cdu-05---Pesquisar-Duvidas)
- [CDU 06 - Indicar Duplicatas](#cdu-06---Indicar-duplicatas)
- [CDU 07 - Votar](#cdu-07---Votar)
- [CDU 08 - Responder Duvidas](#cdu-08---Responder-Dúvidas)
- [CDU 09 - Postar Duvidas](#cdu-09---Postar-Dúvidas)
- [CDU 10 - Gerenciamnto de Links](#cdu-10---Gerenciamento-de-links)
- [CDU 11 - Gerenciamento de Arquivos](#cdu-11---Gerenciamento-de-arquivos)


# CDU 01 - Cadastro

**Atores**: Aluno

**Pré-condicoes**: Não há

**Fluxo principal**:

   1. Cadastro realizado no site servirá para gerar comentários.

# CDU 02 - Autenticar

**Atores**: Professor e aluno

**Pré-condicoes**: Ter realizado cadastro no site ou ter cadastro master.

**Fluxo principal**:

   1. Informar o nome de usuário e a senha.

# CDU 03 - Visualizar Links
 
**Atores**: Professor e Aluno
 
**Pré-Condições**: Não há.
 
**Fluxo principal**:
 
   1. Usuário solicita acesso ao link.

# CDU 04 - Visualizar Arquivos

**Atores**: Professor e Aluno

**Pré-Condições**: Não há

**Fluxo principal**:

  1. Usuário solicita acesso ao arquivo

# CDU 05-Pesquisar Duvidas
 
 **Autores**: Aluno e Professor
 
 **Pré-Codições**: Estar cadastrado para acessar as dúvidas.
 
 **Fluxo Principal**:
 
   1. Informar as dúvidas perguntadas.

# CDU 06-Indicar Duplicatas
 
 **Autores**: Aluno e Professor
 
 **Pré-Codições**: Não há.
 
 **Fluxo Principal**:
 
   1. Mostrar que a pergunta (Que foi indicada como duplicata) já tem resposta.

# CDU 07-Votar
 
**Autores**: Aluno e Professor
 
**Pré-Codições**: Estar cadastrado para acessar as dúvidas.
 
**Fluxo Principal**:
 
   1. Quanto mais votos em respostas melhor posição se encontra.

# CDU 08 - Responder Dúvidas

**Atores**: Aluno e o Professor

**Pré-condições**: Estar cadastrado e logado.

**Fluxo principal***:

 1. Aluno ou Professor seleciona a área de responder dúvidas.
 2. Sistema lista as dúvidas salvas.
 3. Aluno ou professor seleciona a dúvida que ele deseja responder.
 4. Sistema mostra janela de perguntas e respostas
 5. Aluno ou Professor responde as dúvidas.
 6. Sistema salva a resposta para a dúvida.


# CDU 09 - Postar Dúvidas

**Atores**: Aluno

**Pré-condições**: Estar cadastrado.

**Fluxo principal**:

1. Aluno seleciona área de dúvidas.
2. Sistema mostra uma janela de perguntas e respostas.
3. Aluno escreve a dúvida.
4. Sistema salva dúvida.

# CDU 10 - Gerenciamento de Links

**Atores**: professor

**Pré-condições**: Tem que estar logado como administrador.

**Principal Fluxo**:

  1. Professor seleciona uma das áreas.
  2. Sistema recebe o comando e exibe os links presentes na área.
  3. Sistema informa ao Professor a data das modificações anteriores.
  4. Professor seleciona os novos links.
  5. Sistema recebe os novos links.
  6. Sistema armazena as modificações e mostra o site atualizado ao Aluno.

# CDU 11 - Gerenciamento de Arquivos

**Atores**: professor

**Pré-condições**: Tem que estar logado como administrador.

**Principal Fluxo**:

 1. Professor seleciona uma das áreas.
 2. Sistema recebe o comando e exibe os arquivos presentes na área.
 3. Sistema informa ao Professor a data das modificações anteriores.
 4. Professor seleciona os novos arquivos.
 5. Sistema recebe os novos arquivos.
 6. Sistema armazena as modificações e mostra o site atualizado ao Aluno.
