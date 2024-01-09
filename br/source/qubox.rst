Simulador QuBOX
===============

QuBOX é um hardware portátil que embarca simuladores desenvolvido pela Quantuloop. Projetado para auxiliar no ensino e pesquisa de computação quântica, o simulador QuBOX é uma solução prática para acelerar a execução quântica de aplicações escritas em Ket.

O Simulador QuBOX foi pensado para ser levado para sala de aula ou laboratório, sem a necessidade de nenhuma infraestrutura além do acesso a rede e energia. Na UFSC, o simulador QuBOX está disponível para acesso em nuvem, sendo necessário poucas configurações para que você consiga acelerar sua aplicação quântica.

Especificações
--------------

O simulador possui dois modos de simulação, **esparso** e **denso**, com complexidade de tempo de simulação associado a diferentes aspectos da computação quântica. O tempo de simulação do modo **esparso** depende do número de estados da base computacional necessários para representar o estado quântico. Já para o modo **denso**, o tempo de simulação depende do número de qubits. Em outras palavras, a complexidade de tempo de simulação para preparar um estado :math:`\sum_{k=0}^{2^n-1}\alpha_k\left|k\right>`, onde :math:`n` é o número de qubits, cresce exponencialmente com :math:`n` para o modelo **denso**, e linearitmico com o número de estados onde :math:`\alpha_k\neq0` para o modelo **esparso**. Por exemplo, são necessárias :math:`n-1` portas CNOT para preparar um estado GHZ :math:`\frac{1}{\sqrt{2}}(\left|0\dots0\right>+\left|1\dots1\right>)` de :math:`n` qubits, sendo que, no modo  **esparso** cada porta CNOT tem complexidade de tempo de simulação constante com relação ao número de qubits e no modo **denso** tem complexidade exponencial. Por outro lado, para preparar um estado :math:`\frac{1}{\sqrt{2^n}}\sum_{k=0}^{2^n-1}\left|k\right>` de :math:`n` qubits, são necessárias :math:`n` portas Hadamard, o que gera uma complexidade de tempo de simulação :math:`O(2^n\log{2^n})` no modelo **esparso** e :math:`O(n2^n)` no modelo **denso**.

.. note::

  O modo de simulação deve ser escolhido conforme as características específicas de cada algoritmo quântico.

Além dos modos de simulação, o simulador esparso possibilita escolher a precisão das operações de ponto flutuante, estando disponíveis as opções de precisão **simples** (``float``) e **dupla** (``double``). Simular com precisão **dupla** diminui consideravelmente erros de arredondamento, algo que pode invalidar o resultado de uma execução com muitas portas lógicas quânticas. Por outro lado, com precisão **simples** é possível simular estados quânticos maiores ou em menor tempo. Em simulações curtas não há uma diferença prática entre utilizar precisão simples ou dupla, sendo assim, é recomendado utilizar precisão **simples**. A precisão das operações de ponto flutuante tem maior impacto no modelo **esparso**.

A tabela abaixo apresenta a capacidade de simulação do QuBOX. Para o modelo **esparso**, a unidade de medida utilizada é a quantidade de estados da base computacional necessários para representar o sistema quântico, sendo possível espalhar estes estados em até 2048 qubits. No modelo **denso**, o tamanho da simulação é definido pelo número de qubits.

.. list-table:: Capacidade de simulação 
    :header-rows: 1
    :stub-columns: 1
    :align: center
    :widths: 11 9 9
    
    * - 
      - Esparso 
      - Denso
    * - Precisão Simples (``float``)
      - :math:`2^{27}` Estados em Superposição
      - 30 Qubits
    * - Precisão Dupla (``double``)
      - :math:`2^{26}` Estados em Superposição
      - NA


.. _Instalação e Configuração:

Instalação e Configuração
-------------------------

A Linguagem Ket e o cliente para acessar o QuBOX podem ser instalados usando o comando ``pip``. Python 3.7 ou mais novo é necessário. Use o comando abaixo para instalar os pacotes. 

.. code-block:: bash

    pip install pip -U
    pip install ket-lang -U
    pip install qubox-ufsc


Para configurar o Ket a usar o QuBOX na execução quântica, importe o módulo ``qubox_ufsc`` e faça o cadastro como no exemplo abaixo. 

.. code-block:: py

    import qubox_ufsc
    qubox_ufsc.login(
        name="Your Name",
        email="you_email@example.com",
        affiliation="Your Affiliation"
    )



A tabela abaixo apresenta os comandos opcionais para selecionar o modo a precisão da simulação. Por padrão, o QuBOX usa simulação **esparsa** com precisão **simples**.

.. list-table:: Configuração do simulador 
    :header-rows: 1
    :stub-columns: 1

    * - 
      - Esparso
      - Denso
    * - Precisão Simples
      - 
        .. code-block:: py

            qubox_ufsc.config(
                mode="sparse",
                precision=1,
            )
      - 
        .. code-block:: py

            qubox_ufsc.config(
                mode="dense"
            )

    * - | Precisão 
        | Dupla
      - 
        .. code-block:: py

            qubox_ufsc.config(
                mode="sparse",
                precision=2,
            )
            
      - NA
