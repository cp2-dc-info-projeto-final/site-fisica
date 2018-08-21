# Especificações de Casos de Usos

# Sumário
- [CDU 01 - Cadastro](#cdu-01---cadastro)
- [CDU 02 - Autenticar](#cdu-02---autenticar)
- [CDU 03 - Visualizar Links](#cdu-03---visualizar-links)
- [CDU 04 - Visualizar Arquivos](#cdu-04---visualizar-arquivos)
- [CDU 05 - Pesquisar Duvidas](#cdu-05---pesquisar-duvidas)
- [CDU 06 - Indicar Duplicatas](#cdu-06---indicar-duplicatas)
- [CDU 07 - Votar](#cdu-07---votar)
- [CDU 08 - Responder Duvidas](#cdu-08---responder-dúvidas)
- [CDU 09 - Postar Duvidas](#cdu-09---postar-dúvidas)
- [CDU 10 - Gerenciamnto de Links](#cdu-10---gerenciamento-de-links)
- [CDU 11 - Gerenciamento de Arquivos](#cdu-11---gerenciamento-de-arquivos)


# CDU 01 - Cadastro

**Atores**: Aluno

**Pré-condicoes**: Não há

**Fluxo principal**:

   1. Cadastro realizado no site servirá para gerar comentários.

# CDU 02 - Autenticar

**Atores**: Professor e aluno

**Pré-condicoes**: Ter realizado cadastro no site ou ter cadastro master.

**Fluxo principal**:

   1. Usuário clica no link.
   2. Sistema redireciona o Usuário.
   3. Usuário é redirecionado para o link escolhido.

# CDU 03 - Visualizar Links
  **Atores**: Professor e Aluno

   **Pré-Condições**: Não há.

   **Fluxo principal**:

   1. Usuário clica no link
   2. Sistema redireciona o Usuário para o link

# CDU 04 - Visualizar Arquivos

**Atores**: Professor e Aluno

**Pré-Condições**: Não há

**Fluxo principal**:

  1. Usuário clica no arquivo.
  2. Sistema redireciona o Usuario para a visualização ou descarregamento do arquivo.
  3. Usuário é redirecionado para a interação escolhida com o arquivo.

# CDU 05 - Pesquisar Duvidas

 **Autores**: Aluno e Professor

 **Pré-Codições**: Estar cadastrado para acessar as dúvidas.

 **Fluxo Principal**:

   1. Aluno ou Professor seleciona a área de  dúvidas.
   2. Sistema mostrará uma área para o aluno ou o professor escolher qual a matéria da dúvida desejada.
   3. Aluno ou professor clicará na área do seu interesse e tera acesso a essa dúvidas.
   4. Informar os dúvidas perguntadas.

# CDU 06 - Indicar Duplicatas

 **Autores**: Aluno e Professor

 **Pré-Codições**: Não há.

 **Fluxo Principal**:

   1. O usuário de clicar no botão de reprotar pergunta.
   2. O sistema informará qual erro deve ser reportado.
   3. O usuário deve indicar a duplicata.
   4. Se a pergunta for reportada mais de 7 vezes pelos alunos ou o professor reporta o usuario sera levada para a resposta da outra           pergunta ja respondida
   5. O sistema Mostrará que a pergunta (Que foi indicada como duplicata) ja tem resposta e então a deletara.

# CDU 07 - Votar

**Autores**: Aluno e Professor

**Pré-Codições**: Estar cadastrado para acessar as dúvidas.

**Fluxo Principal**:

   1. O aluno ou o professor deve clicar no joinha para votar.
   2. O aluno ou o professor clicara no joinha positivo ou no joinha negativo.
   3. Quanto mais votos positivos em respostas melhor posição se encontrará.

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
