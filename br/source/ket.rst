Tutorial de Ket
===============

Ket é uma linguagem de programação embarcada em Python, projetada para facilitar o desenvolvimento de aplicações híbridas clássica-quântica. Ket é um projeto open-source derivado do `trabalho de mestrado de Evandro C. R. Rosa <https://repositorio.ufsc.br/handle/123456789/229874>`_ no Programa de Pós-Graduação em Ciência da Computação (PPGCC) da UFSC. Para mais informações, visite https://quantumket.org.


Instalação |PyPI|
-----------------

.. |PyPI| image::  https://img.shields.io/pypi/v/ket-lang

Ket está disponível para Linux, Windows e macOS no `PyPi <https://pypi.org/project/ket-lang>`_ e pode ser instalado ``pip``, como no comando abaixo:

.. code-block:: bash

    pip install ket-lang -U


É possível usar Ket no **Google Colab**.  Para isso, acesse https://colab.research.google.com e use o comando abaixo:

.. code-block:: bash

    !pip install ket-lang -q

Guia Básico
-----------

O código a seguir importa o Ket e instância uma lista de qubits (uma :class:`~ket.libket.quant`).

.. code-block:: ket

    from ket import *
    q = quant(10)

É possível indexar os qubits de um :class:`~ket.libket.quant` usando colchetes da mesma forma que fazemos com elementos de uma lista em Python. Abaixo segue exemplos disto e de como podemos aplicar portas quânticas nesses qubits. Você pode conferir as portas quânticas disponíveis no Ket `aqui <https://quantumket.org/ket.html#module-ket.gates.quantum_gate.quantum_gate>`_.

.. code-block:: ket

    H(q[-1]) # Hadamard no último qubit
    X(q[0])  # Pauli X no primeiro qubit
    Y(q[:5]) # Pauli Y nos 5 primeiros qubits
    Z(q[5:]) # Pauli Z no quinto qubit em diante

Para aplicar portas lógicas controladas no Ket é possível usar a função :func:`~ket.standard.ctrl`. Por exemplo, o comando ``ctrl(qubits_controle, porta, qubits_alvo)`` aplica a ``porta`` em todos os ``qubits_alvo`` quando os ``qubits_controle`` estiverem em :math:`\left|1\right>`. Opcionalmente, é possível escolher um estado específico para se aplicar um porta usando o parâmetro ``on_state``. Por exemplo, ``ctrl(qubits_controle, porta, qubits_alvo, on_state=2)`` irá aplicar a ``porta`` quando os ``qubits_controle`` estiverem no estado :math:`\left|0\dots0 10 \right\rangle`.

Medida
^^^^^^

A única operação que afeta tanto o estado clássico quanto o estado quântico é a medida. A função :func:`~ket.standard.measure` recebe um :class:`~ket.libket.quant` como parâmetro e retorna um :class:`~ket.libket.future`. Para acessar o resultado da medida, basta ler o atributo ``.value`` do :class:`~ket.libket.future` retornado.

Exemplo da medida em Ket:

.. code-block:: ket

    a, b = quant(2)
    H(a)
    ctrl(a, X, b)
    # Medida dos qubits
    medida = measure(a+b)
    # Pega o valor do computador quântico
    resultado = medida.value

.. tip::

    Ket permite efetuar diversas mídias em uma única execução quântica, além disso, é possível usar o resultado de uma medida quântica para controlar o fluxo de execução no computador quântico. Para mais informações veja https://quantumket.org/runtime.html.

Visualizar o Estado Quântico
^^^^^^^^^^^^^^^^^^^^^^^^^^^^

Ket permite visualizar os estados da base computacional que compõem a superposição quântica usando uma variável do tipo :class:`~ket.libket.dump`. Esta é uma operação não possui efeito colateral no estado quântico, porém, ela só é possível em execuções quânticas simuladas.

Como podemos ver no exemplo abaixo, é possível iterar sobre um estado quântico usando os atributos :attr:`~ket.libket.dump.states` e :attr:`~ket.libket.dump.amplitudes` de um :class:`~ket.libket.dump`.

.. code-block:: ket

    q = quant(3)
    H(q)
    d = dump(q)
    for state, amp in sorted(zip(d.states, d.amplitudes)):
        print(f'{amp}|{state:0{len(q)}b}⟩')

.. code-block:: text

    (0.35355339059327384+0j)|000⟩
    (0.35355339059327384+0j)|001⟩
    (0.35355339059327384+0j)|010⟩
    (0.35355339059327384+0j)|011⟩
    (0.35355339059327384+0j)|100⟩
    (0.35355339059327384+0j)|101⟩
    (0.35355339059327384+0j)|110⟩
    (0.35355339059327384+0j)|111⟩


Usando o method :meth:`~ket.libket.dump.show`, é possível imprimir na tela o estado quântico de um :class:`~ket.libket.dump`. Por exemplo:

.. code-block:: ket

    q = quant(3)
    H(q)
    d = dump(q)
    print(d.show())

.. code-block:: text

    |000⟩	(12.50%)
     0.353553       	≅      1/√8
    |001⟩	(12.50%)
     0.353553       	≅      1/√8
    |010⟩	(12.50%)
     0.353553       	≅      1/√8
    |011⟩	(12.50%)
     0.353553       	≅      1/√8
    |100⟩	(12.50%)
     0.353553       	≅      1/√8
    |101⟩	(12.50%)
     0.353553       	≅      1/√8
    |110⟩	(12.50%)
     0.353553       	≅      1/√8
    |111⟩	(12.50%)
     0.353553       	≅      1/√8


Minicurso
---------

Durante o `IV Workshop de Computação Quântica da UFSC <https://workshop-cq.ufsc.br/2021>`_, evento organizado pelo GCQ-UFSC, tivemos o minicurso `Introdução a Computação Quântica com Ket`. Nele é apresentado os conceitos básicos da computação quântica e como podemos usá-los no Ket. Você pode conferir o minicurso na íntegra nos vídeos abaixo ou no canal do `GCQ-UFSC no YouTube <https://www.youtube.com/c/GCQUFSC>`_.

**Parte 1**

.. raw:: html

    <div align="center">
    <iframe width="100%" height="315" src="https://www.youtube-nocookie.com/embed/LnNh-l1_bNc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

**Parte 2**

.. raw:: html

    <div align="center">
    <iframe width="100%" height="315" src="https://www.youtube-nocookie.com/embed/E44ejmGi7lg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
