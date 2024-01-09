Estimativa de Fase
==================

A estimativa de fase é a chave principal para vários algoritmos quânticos, como a busca de ordem e a fatoração.
Suponha o operador unitário :math:`U` tenha autovetor :math:`\ket{u}` com autovalor :math:`e^{2\pi i \varphi}`, onde :math:`\varphi` é desconhecido e descobri-lo é o objetivo.

Para isso são necessário dois conjuntos de qubits.
O primeiro possui :math:`t` qubits no estado :math:`\ket{0}`, onde :math:`t` depende da precisão desejada na estimativa e da probabilidade desejada da estimativa estar correta.
Já o segundo, inicia no estado :math:`\ket{u}` e possui a quantidade de qubits necessária para representar tal estado.

.. note::

    Para se obter :math:`\varphi` com uma precisão de :math:`n` bits e probabilidade de sucesso de pelo menos :math:`1 - \varepsilon`, precisa-se de

    .. include:: /_static/math/phase_estimation/t_value.rst

Existem três estágios durante a estimativa.
Primeiramente a porta de Hadamard é aplicada no primeiro conjunto e na sequência operações :math:`U`-controladas são aplicadas no segundo conjunto, com :math:`U` elevada a sucessivas potências de dois, conforme a figura.

.. image:: /_static/algoritmos/phase_estimation/phase_estimation.svg
    :width: 75%
    :align: center
    :class: only-light, no-scaled-link


.. image:: /_static/algoritmos/phase_estimation/phase_estimation_dark.svg
    :width: 75%
    :align: center
    :class: only-dark, no-scaled-link

Com isso, o estado final do primeiro conjunto é

.. include:: /_static/math/phase_estimation/first_register.rst

Agora, suponha que com exatamente :math:`t` bits seja possível representar :math:`\varphi` como :math:`0.\varphi_1 \dots \varphi_t`.
Então o estado resultante pode ser reescrito como

.. include:: /_static/math/phase_estimation/first_register_bin.rst

No segundo estágio, a transformada de Fourier Quântica inversa é aplicada no primeiro conjunto de qubits.
Com isso, tem-se o estado :math:`\ket{\varphi_1 \dots \varphi_t}`, o que resulta exatamente em :math:`\varphi`.

Por fim, no terceiro estágio, é feita a leitura do primeiro conjunto de qubits para se obter a fase :math:`\varphi`.

A estimativa de fase pode ser representada de forma geral pelo seguinte circuito.

.. image:: /_static/algoritmos/phase_estimation/phase_estimation_full.svg
    :width: 75%
    :align: center
    :class: only-light, no-scaled-link


.. image:: /_static/algoritmos/phase_estimation/phase_estimation_full_dark.svg
    :width: 75%
    :align: center
    :class: only-dark, no-scaled-link

