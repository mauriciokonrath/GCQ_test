Fatoração
=========

O problema de fatoração tem grande importância na computação, sendo um dos pilares por trás da criptografia.
Ele consiste em encontrar dois números que, quando multiplicados, resultem :math:`N`.
Tal problema é equivalente ao problema da busca de ordem, ou seja, é possível utilizar o algoritmo que resolve a busca de ordem, com as devidas adaptações, para se fatorar um número.
Para isso, a redução da fatoração para a busca de ordem é feita em duas partes, ambas podendo ser expressas por teoremas.

Na primeira etapa é preciso mostrar que se pode computar um fator de :math:`N` se for possível encontrar uma solução não-trivial :math:`x \neq \pm 1 \pmod N` para a equação :math:`x^2 = 1 \pmod N`.

.. topic:: Teorema

    Seja :math:`N` um número composto de :math:`L` bits, e :math:`x` uma solução não-trivial da equação :math:`x^2 = 1 \pmod N` na faixa :math:`1 \le x \le N`, isto é, excluídos :math:`x = 1 \pmod N` e :math:`x = N - 1 = -1 \pmod N`.
    Nessas condições, pelo menos um dentre ``mdc``:math:`(x - 1, N)` e ``mdc``:math:`(x + 1, N)` será um fator não-trivial de :math:`N`, que pode ser computado com :math:`O(L^3)` operações.

Para a segunda, é necessário provar que um número :math:`y` co-primo de :math:`N` escolhido aleatoriamente terá, com grande probabilidade, uma ordem par tal que :math:`y^{r / 2} \neq \pm 1 \pmod N`, e portanto :math:`x \equiv y^{r / 2} \pmod N` será uma solução não-trivial de :math:`x^2 = 1 \pmod N`.

.. topic:: Teorema

    Seja :math:`N = p_1^{\alpha_1} \dots p_m^{\alpha_m}` a decomposição em fatores primos de um número inteiro positivo ímpar.
    Seja :math:`x` um inteiro escolhido aleatoriamente no intervalo :math:`1 \le x \le N - 1` que seja co-primo de :math:`N`.
    Nesse caso (:math:`p =` probabilidade),

    .. math::

        p(r \text{ seja par e } x^{r/2} \neq -1 \pmod N) \ge 1 - \dfrac{1}{2^{m-1}}

Juntos, os teoremas formam um algoritmo que retorna um fator não-trivial de :math:`N`, com alta probabilidade.

Pseudocódigo
------------

Todo algoritmo pode ser executado de forma eficiente por um computador clássico, com exceção da parte de busca de ordem.
Segue um pseudocódigo que retorna um fator não-trivial de :math:`N`

#. Se :math:`N` for par, retorne o fator 2.
#. Se :math:`N = a^b`, com :math:`a \ge 1` e :math:`b \ge 2`, retorne o fator :math:`a`.
#. Dado um :math:`x` aleatório no intervalo 1 até :math:`N - 1`. Se ``mdc``:math:`(x, N) > 1`, retorne o fator ``mdc``:math:`(x, N)`.
#. Use a sub-rotina de busca de ordem para encontrar a ordem :math:`r` de :math:`x \mod N`.
#. Se :math:`r` for par, e :math:`x^{x/2} \neq -1 \pmod N`,  compute ``mdc``:math:`(x^{r/2}-1, N)` e ``mdc``:math:`(x^{r/2}+1, N)`. Se um desses resultados é um fator não-trivial, retorne esse fator. Caso contrário, o algoritmo falha.
