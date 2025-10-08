# Relatório de Segurança - Mini CRUD

Este relatório lista achados de segurança mapeados para A01-A10 OWASP Top 10 (exemplos) no projeto e recomendações.

## Resumo das ações

- Adicionado fluxo básico de autenticação (login/logout) com senha hasheada.
- Protegidas páginas sensíveis (`listagem.php`, `contato-alterar.php`, `excluir-contato.php`, `destino-contato-alterar.php`) exigindo sessão.
- Criado `create_user.php` para facilitar criação de usuário de teste.

## Achados e recomendações (A01-A10)

A01 - Broken Access Control (Controle de Acesso Quebrado)

- Evidência: originalmente qualquer pessoa podia acessar `listagem.php`, `excluir-contato.php`, `contato-alterar.php` diretamente via URL.
- Recomendação: Proteger todas as páginas que modificam/mostram dados sensíveis com verificação de sessão e privilégios. Implementar roles e checar autorização por recurso.

A02 - Criptografia Fraca (Falhas Criptográficas)

- Evidência: senha do DB em `config.ini` em plain-text; conexões não forçam TLS.
- Recomendação: Remover senhas do repositório, usar variáveis de ambiente ou secrets manager. Habilitar TLS/SSL no MySQL e no servidor web. Usar password_hash (já implementado) e nunca armazenar senhas em texto.

A03 - Injeção

- Evidência: Uso de queries dinâmicas em alguns pontos (ex: `listagem.php` usava `query()` com SQL fixo; parâmetros usam prepared statements em outros lugares, mas entradas exibidas no HTML não são escapadas consistentemente).
- Recomendação: Usar sempre prepared statements para qualquer entrada do usuário. Validar e sanitizar entradas no servidor. Evitar concatenar valores em SQL.

A04 - Design Inseguro

- Evidência: Falta de separação clara entre camadas, arquivos de configuração incluídos diretamente, uso direto de `require` sem validações.
- Recomendação: Arquitetura com camadas, validação centralizada, uso de frameworks e bibliotecas testadas.

A05 - Configuração Incorreta de Segurança

- Evidência: `config.ini` contém credenciais; `debug` pode mostrar mensagens; arquivos sensíveis podem estar acessíveis.
- Recomendação: Evitar commitar `config.ini`; usar `.env` ou variáveis de ambiente; desabilitar debug em produção.

A06 - Componentes Vulneráveis e Desatualizados

- Evidência: inclusão de CDN antigo e falta de lockfiles; projeto pode conter libs desatualizadas.
- Recomendação: Atualizar dependências, monitorar CVEs e usar ferramentas de varredura.

A07 - Falhas de Identificação e Autenticação

- Evidência: Não havia login inicialmente; sessões não iniciadas; possível Session Fixation (agora regeneramos ID no login).
- Recomendação: Implementar bloqueio de conta, políticas de senha, MFA, limites de sessão e políticas de expiração.

A08 - Falhas de Integridade de Dados

- Evidência: Erros SQL são exibidos ao usuário (em `destino-contato.php`) revelando detalhes internos.
- Recomendação: Não exibir erros detalhados em produção; logar internamente com acesso restrito.

A09 - Falhas de Monitoramento e Registro

- Evidência: Não há logging de eventos de segurança (login, exclusões).
- Recomendação: Implementar logs de auditoria, armazenar em local protegido e roteiro de alertas.

A10 - SSRF

- Evidência: Projeto não faz requests a recursos externos, risco baixo, mas inserir endpoints dinâmicos pode causar SSRF.
- Recomendação: Validar e restringir URLs/hosts quando houver solicitações a serviços externos.

## Como testar rapidamente

1. Acesse `app/create_user.php` para criar o usuário de teste `admin` com senha `Admin@123`.
2. Vá para `app/login.php` e efetue login.
3. Tente acessar `listagem.php` sem login para verificar redirecionamento.

## Observações finais

- Este é um exercício didático. Remover `create_user.php` depois de usado.
- Substituir credenciais em `config.ini` por variáveis de ambiente antes de colocar em produção.
