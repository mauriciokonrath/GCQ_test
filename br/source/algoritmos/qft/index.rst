Transformada de Fourier Quântica
================================

.. TODO: colocar exemplos em tabs?

A transformada de Fourier quântica é elemento central na resolução de diversos algoritmos quânticos, como, por exemplo, a fatoração quântica e a estimativa de fase.
Além disso ela também possibilita um ganho exponencial.

Transformada Discreta (Clássica)
--------------------------------

Nessa notação a transformada recebe como entrada um vetor de números complexos, :math:`x_0, \dots, x_{N - 1}`, onde :math:`N` é fixo.
Como saída têm-se os dados transformados, ou seja, um vetor de números complexos, :math:`y_0, \dots, y_{N - 1}`, definidos por

.. include:: /_static/math/qft/discrete_transform.rst

.. note::

    .. include:: /_static/math/qft/euler.rst

Transformada Quântica
---------------------

A transformada quântica é exatamente a mesma transformação, porém com uma notação diferente.

.. include:: /_static/math/qft/qft.rst

**Exemplos**

.. include:: /_static/math/qft/qft_examples.rst

Estado Arbitrário
^^^^^^^^^^^^^^^^^

A notação anterior é aplicável para uma base ortonormal, em um estado arbitrário possui a seguinte ação

.. include:: /_static/math/qft/qft_arbitrary.rst

onde cada amplitude :math:`y_k` é a transformada de Fourier discreta da amplitude :math:`x_j`.


Representação de Produto
^^^^^^^^^^^^^^^^^^^^^^^^

A transformada de Fourier quântica pode ser reescrita de forma a usar cada qubit de forma direta na fórmula.
Provavelmente essa é forma de representação mais útil da transformada, visto que a partir dela um circuito quântico pode ser facilmente construído.

.. include:: /_static/math/qft/product_repr.rst

.. note:: Representação de frações binárias

    .. include:: /_static/math/qft/bin_fraction.rst

**Exemplos**

.. include:: /_static/math/qft/product_repr_examples.rst


Circuito
^^^^^^^^

O circuito a seguir foi feito a partir da representação de produto, porém é necessário aplicar portas `swap` ao final caso se deseje o resultado exatamente nos mesmos qubits.

.. image:: /_static/algoritmos/qft/qft.svg
    :width: 125%
    :align: center
    :class: only-light, no-scaled-link


.. image:: /_static/algoritmos/qft/qft_dark.svg
    :width: 125%
    :align: center
    :class: only-dark, no-scaled-link

onde

.. include:: /_static/math/qft/rk_transform.rst


.. topic:: Leitura Opcional

    O texto da sequência é uma leitura opcional por trazer algumas manipulações algébricas não triviais.


Equivalência
^^^^^^^^^^^^

Agora vamos provar a equivalência entre as representações, para isso vamos fazer algumas manipulações algébricas na definição e chegar na representação de produto.

.. include:: /_static/math/qft/equivalence.rst

.. note::

    .. include:: /_static/math/qft/notation.rst
