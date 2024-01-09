Busca de Ordem
==============

Seja :math:`x` e :math:`N, x < N`, sem fatores comuns, a **ordem** de :math:`x` módulo :math:`N` é definida como o menor inteiro positivo :math:`r` tal que :math:`x^r = 1 \pmod N`.
Até o momento esse é um problema difícil de ser resolvido por um computador clássico usando recursos polinomiais nos :math:`O(L)` bits necessários para especificar o problema, com :math:`L \equiv \lceil \log (N) \rceil`.

A busca de ordem pode ser reduzida ao problema da estimativa de fase com algumas manipulações algébricas um tanto complexas, as quais podem ser vistas nas referências.
Mas consiste em aplicar o operador unitário :math:`U` de forma que

.. include:: /_static/math/order_finding/u_operator.rst

Para a redução ser possível, duas condições devem ser cumpridas.
A primeira é que seja possível implementar uma operação :math:`U^{2^j}`-controlada, para qualquer inteiro :math:`j`.
Ela é satisfeita usando-se o procedimento conhecido como `exponenciação modular`.

Já a segunda é a preparação de um auto-estado com autovalor não-trivial, o que requer saber saber o valor de :math:`r`.
Felizmente, isso é resolvido com a estimativa de fase.

Exponenciação Modular
---------------------

Com algumas manipulações, é perceptível a equivalência entre a aplicação de portas :math:`U^{2^j}`-controladas e o uso de `exponencial modular`, como segue:

.. include:: /_static/math/order_finding/mod_exp.rst

E essa operação pode ser facilmente realizada com a técnica de computação reversível.

Circuito
--------

O circuito completo da busca de ordem é muito semelhante ao da estimativa de fase, sendo

.. image:: /_static/algoritmos/order_finding/order_finding.svg
    :width: 75%
    :align: center
    :class: only-light, no-scaled-link


.. image:: /_static/algoritmos/order_finding/order_finding_dark.svg
    :width: 75%
    :align: center
    :class: only-dark, no-scaled-link
