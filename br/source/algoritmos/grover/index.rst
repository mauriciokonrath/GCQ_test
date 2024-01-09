Algoritmo de Busca de Grover
============================

Aqui será abordado como implementar o algoritmo quântico de Grover para resolver o problema da busca em base de dados desordenada, o qual é mais eficiente que as soluções clássicas.

Problema
--------

O problema pode ser resumido em encontrar um determinado elemento dado uma lista desordenada de tamanho :math:`2^n`.
Para isso, deve ser criada uma função booleana :math:`f: \{0, 1\}^n \to \{0, 1\}`, a qual só sinalize '1' para o elemento desejado.

.. math::

    f(x) =  \begin{cases}
                0, x \ne x_0 \\
                1, x = x_0
            \end{cases}

.. topic:: Observação

    Cada elemento da lista será codificado em um estado da base computacional :math:`\left| i \right\rangle, i = \{0, \dots, 2^n - 1\}`.

Oráculo
-------

Um oráculo faz o mesmo que a função booleana descrita anteriormente.
Existem dois tipos de oráculos, XOR e os de fase, nesse problema será utilizado o de fase.

Oráculo de Fase
^^^^^^^^^^^^^^^

O oráculo de fase introduzirá uma fase de :math:`\pi`, ou seja, multiplicará por :math:`-1`.

- Exemplo: dado :math:`\left| \psi \right\rangle = \dfrac{1}{\sqrt{2}}\left( \left| 0 \right\rangle + \left| 1 \right\rangle\right)`. Se o oráculo for usado para marcar o estado :math:`\left| 1 \right\rangle`, o resultado será :math:`O(\left| \psi \right\rangle) = \dfrac{1}{\sqrt{2}}\left( \left| 0 \right\rangle - \left| 1 \right\rangle\right)`.

Algoritmo
---------

O primeiro passo consiste em aplicar a porta de Hadamard em todos os qubits para se conseguir uma superposição com pesos iguais.

.. math::
    H^{\otimes n}\left|0\right\rangle^{\otimes n}.

Após isso aplicamos :math:`G` (operador de Grover) :math:`k` vezes, em que :math:`G` representa a seguinte sequência de passos:

1. Aplicar o oráculo de fase para o estado desejado;
2. Aplicar a porta de Hadamard em todos os qubits;
3. Aplicar o operador :math:`2 \left| 0 \right\rangle \left\langle 0 \right| - I`;
    .. note::

        Na notação utilizada aqui :math:`\left| 0 \right\rangle` representa :math:`\left| 0 \right\rangle^{\otimes n}`.

4. Aplicar a porta de Hadamard em todos os qubits.

Notação Auxiliar
^^^^^^^^^^^^^^^^

.. math::
    \begin{matrix}
        \mathbb{B}_n: \text{conjunto de todas as palavras de n bits}. \\
        \mathbb{M}: \text{conjunto de todos itens desejados}. \\
        N = 2^n
        \begin{cases}
            n: \text{número de qubits}. \\
            N: \text{número de itens}.
        \end{cases} \\
        M: \text{número de itens desejados (usaremos } M = 1). \\
        \left| \alpha \right\rangle := \displaystyle \sum_{\substack{x \in \mathbb{B}_n \\ f(x) = 0}} \frac{\left| x \right\rangle}{\sqrt{N - M}} \\
        \left| \beta \right\rangle := \displaystyle\sum_{\substack{x \in \mathbb{B}_n \\ f(x) = 1}} \dfrac{\left| x \right\rangle}{\sqrt{M}} : \text{itens desejados}. \\
        S := \text{span}_\mathbb{R}\{\left| \alpha \right\rangle, \left| \beta \right\rangle \} : \text{espaço vetorial gerado por } \left| \alpha \right\rangle \text{ e } \left| \beta \right\rangle.
    \end{matrix}

Difusor
^^^^^^^

.. math::
    \begin{matrix}
        2 \left| 0 \right\rangle \left\langle 0 \right| - I &=& 2 \cdot
        \begin{bmatrix}
            1       \\
            0       \\
            \vdots  \\
            0
        \end{bmatrix}_{n \times 1}
        \begin{bmatrix}
            1 & 0 & \cdots & 0
        \end{bmatrix}_{1 \times n} -
        \begin{bmatrix}
            1 & 0 & \cdots & 0 \\
            0 & 1 & \cdots & 0 \\
            \vdots & \vdots & \ddots & 0 \\
            0 & 0 & \cdots & 1
        \end{bmatrix}_{n \times n}
        \\
        &=&
        \begin{bmatrix}
            2 & 0 & \cdots & 0 \\
            0 & 0 & \cdots & 0 \\
            \vdots & \vdots & \ddots & 0 \\
            0 & 0 & \cdots & 0
        \end{bmatrix}_{n \times n} -
        \begin{bmatrix}
            1 & 0 & \cdots & 0 \\
            0 & 1 & \cdots & 0 \\
            \vdots & \vdots & \ddots & 0 \\
            0 & 0 & \cdots & 1
        \end{bmatrix}_{n \times n}
        \\
        &=&
        \begin{bmatrix}
            1 & 0 & \cdots & 0\\
            0 & -1 & \cdots & 0 \\
            \vdots & \vdots & \ddots & 0 \\
            0 & 0 & \cdots & -1
        \end{bmatrix}_{n \times n}
        \\
        &=& \left| 0\dots 0 \right\rangle \left\langle 0 \dots 0 \right| - \left| 0 \dots 1 \right\rangle \left\langle 0 \dots 1 \right| -\dots - \left| 1 \dots 1\right\rangle \left\langle 1 \dots 1 \right|
    \end{matrix}


Usando o conceito de fase global, é possível escrever o resultado de outra forma, sendo ela:

.. math::
    -\left| 0\dots 0 \right\rangle \left\langle 0 \dots 0 \right| + \left| 0 \dots 1 \right\rangle \left\langle 0 \dots 1 \right| + \dots + \left| 1 \dots 1\right\rangle \left\langle 1 \dots 1 \right|



Para obter esse resultado, basta usar o oráculo de fase visto anteriormente e usá-lo para marcar o estado :math:`\left| 0 \right\rangle`.

Primeira Aplicação de :math:`G`
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

Antes de fazer as aplicações, temos:

.. math::
    \begin{matrix}
        \left| \psi_0 \right\rangle &=& \left| + \right\rangle^{\otimes n} \\
        &=& \sum_{x \in \mathbb{B}_n} \dfrac{\left| x \right\rangle}{\sqrt{N}} \\
        &=& \sum_{\substack{x \in \mathbb{B}_n \\ x \ne x_0}}\dfrac{\left| x \right\rangle}{\sqrt{N}} + \dfrac{\left| x_0 \right\rangle}{\sqrt{N}} \\
        &=& \dfrac{\sqrt{N - 1}}{\sqrt{N}}\sum_{\substack{x \in \mathbb{B}_n \\ x \ne x_0}}\dfrac{\left| x \right\rangle}{\sqrt{N - 1}} + \dfrac{\left| x_0 \right\rangle}{\sqrt{N}} \\
        &=& \dfrac{\sqrt{N - 1}}{\sqrt{N}} \left| \alpha \right\rangle + \dfrac{1}{\sqrt{N}} \left| \beta \right\rangle
    \end{matrix}

Após a aplicação do oráculo:

.. math::
    \begin{matrix}
        \left| \psi_1 \right\rangle &=& O_F \left| \psi_0 \right\rangle \\
        &=& \dfrac{\sqrt{N - 1}}{\sqrt{N}} \left| \alpha \right\rangle - \dfrac{1}{\sqrt{N}} \left| \beta \right\rangle
    \end{matrix}

.. image:: /_static/algoritmos/grover/oracle_application.svg
    :width: 50%
    :align: center
    :class: only-light, no-scaled-link


.. image:: /_static/algoritmos/grover/oracle_application_dark.svg
    :width: 50%
    :align: center
    :class: only-dark, no-scaled-link


Aplicação do oráculo de fase equivale a uma reflexão em relação ao eixo :math:`\left| \alpha \right\rangle` [1]_.


Após a aplicação de :math:`2\left| \psi_0 \right\rangle \left\langle \psi_0 \right| - I`:

.. math::
    \begin{matrix}
        \left| \psi_2 \right\rangle &=& (2\left| \psi_0 \right\rangle \left\langle \psi_0 \right| - I) \left| \psi_1 \right\rangle \\
        &=& 2 \left\langle \psi_0 \mid \psi_1 \right\rangle \left| \psi_0 \right\rangle - \left| \psi_1 \right\rangle
    \end{matrix}

.. image:: /_static/algoritmos/grover/diffuser.svg
    :width: 50%
    :align: center
    :class: only-light, no-scaled-link


.. image:: /_static/algoritmos/grover/diffuser_dark.svg
    :width: 50%
    :align: center
    :class: only-dark, no-scaled-link

Aplicação do operador :math:`2 \left| \psi_0 \right\rangle \left\langle \psi_0 \right| − I` equivale a uma reflexão em relação a reta determinada pelo vetor :math:`\left| \psi_0 \right\rangle` [1]_.

Com isso, após uma reflexão sobre o estado :math:`\left| \psi_0 \right\rangle`, obtemos o seguinte resultado:

.. image:: /_static/algoritmos/grover/first_grover.svg
    :width: 50%
    :align: center
    :class: only-light, no-scaled-link


.. image:: /_static/algoritmos/grover/first_grover_dark.svg
    :width: 50%
    :align: center
    :class: only-dark, no-scaled-link

Aplicação do operador :math:`G`. O efeito corresponde à rotação do vetor por um ângulo :math:`\theta` no sentido anti-horário [1]_.

Aplicações Sucessivas de :math:`G`
----------------------------------

A cada aplicação teremos uma rotação no sentido anti-horário, logo, o vetor estará se afastando de :math:`\left| \alpha\right\rangle` e se aproximando de :math:`\left| \beta \right\rangle` (item desejado).

.. image:: /_static/algoritmos/grover/k_applications.svg
    :width: 50%
    :align: center
    :class: only-light, no-scaled-link


.. image:: /_static/algoritmos/grover/k_applications_dark.svg
    :width: 50%
    :align: center
    :class: only-dark, no-scaled-link

Aplicações sucessivas do operador :math:`G` [1]_.

Número de Aplicações
^^^^^^^^^^^^^^^^^^^^

O número de aplicações necessárias é dado por:

.. math::
    k = \dfrac{\pi}{4} \cdot \sqrt{\dfrac{N}{M}}

.. tip::

    Para ver como chegar nesse resultado ou para mais detalhes sobre o algoritmo, recomendamos ler o capítulo 6 do seguinte livro.

    Michael A. Nielsen and Isaac L. Chuang. *Quantum Computation and Quantum Information – 10th Anniversary Edition*. Cambridge University Press, 10th anv edition, 2010. https://doi.org/10.1017/CBO9780511976667.

.. [1] Giovani G. Pollachini. `Computação Quântica: Uma abordagem para estudantes de graduação em Ciências Exatas`. Universidade Federal de Santa Catarina, 2018. :download:`Download </docs/tcc-giovani.pdf>`.

.. toctree::
    :hidden:

    pratica
    exercicio
    solucao
