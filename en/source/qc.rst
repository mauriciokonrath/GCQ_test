Quantum Computing
=================

Brief History
-------------

At the beginning of the 20th century, scientists faced a major problem, which was to explain the behavior of radiation emitted by a black body.
The solution of this problem led to the emergence of Quantum Mechanics, which according to Max Planck’s hypothesis "radiation can only be emitted or absorbed by a black body in integer multiple amounts of :math:`hf`", where :math:`h \approx 6,62 \cdot 10^{-34} J \cdot s` is Planck’s constant and :math:`f` is the frequency of radiation.
The quantization of energy and other quantities on the atomic scale was important to explain a series of other phenomena, such as the photoelectric effect and the spectrum of radiation emitted by atoms and molecules.
The development of Quantum Mechanics allowed us to better understand the behavior of matter on the microscopic scale, in this particular case, semiconductor materials, which allowed the creation of the transistor.
Transistors replaced the valves used in the first digital computers in 1955.
It is important to note that the logic used to perform computational operations in our laptops, PCs, tablets and smartphones is boolean logic, that is, a classic logic that involves operations such as AND, OR and NOT over bits 0 and 1.
Due to their great capacity for calculation and storage, computers are fundamental to the development of any modern society.
This is the so-called first quantum revolution.

One of the great drivers of quantum computing was the physicist Richard Feynman, who in the early 1980s suggested the use of quantum computers to simulate quantum systems.
Feynman’s perception is based on the fact that the number of possible configurations in quantum systems grows exponentially with the number of entities (spins, electrons, atoms, …) considered, making it prohibitive for the memory of current computers to store. so much information even for a small number :math:`(<100)` of particles.

In the following decade, the first quantum algorithms began to appear, among them, the most prominent were Grover’s search algorithm and Shor’s factoring algorithm.
This last algorithm was probably one of the great responsible for the development of quantum computing, since it is able to find the prime factors :math:`p` and :math:`q` that when multiplied resulted in a whole number :math:`N = p \cdot q` on a time scale that grows polynomially with the size of the number :math:`N`.
In other words, the basis of the RSA security system, widely used to perform banking transactions around the world, may be compromised from the existence of large-scale quantum computers.

Since the second decade of the 21st century, not only quantum computing, but other areas such as quantum cryptography, quantum sensors and quantum simulation have received strong attention not only from the academic sector, but also from the industrial sector.
In this way, the rapid development of the so-called quantum technologies has been observed, which configures the second quantum revolution, since the logic behind the processes is of a quantum nature

Current Development
-------------------

Quantum Computing is still in the maturing phase, but it already shows its great potential to solve practical problems, in addition to Shor’s factorization and Grover’s search algorithm, such as optimization problems, machine learning, logistics, quantum chemistry, finance, linear algebra, among others.
In the last five years, large companies such as Google, IBM, Amazon and Microsoft have further intensified their investments in the sector, in addition to several governments from different countries in North America, Europe, Oceania and Asia.
One of the greatest fears regarding quantum computers is related to information security, which affects not only banking transactions, but any and all transmissions of sensitive information, including military, of course.
Attempts to thwart possible attacks by quantum computers include post-quantum cryptography, which despite its name, is based on classical cryptographic methods.

For anyone interested in learning quantum computing, it is worth remembering that some companies make real quantum computers, simulators, kits and languages for algorithm development available to the general public.
For example, it is possible to access the quantum development kit created by IBM (`Qiskit <https://qiskit.org/>`_) for free and run algorithms on some of its quantum computers with a few qubits.
Through this project it will be possible to program in a quantum simulator of up to 30 qubits for free, through the `Ket <https://quantumket.org/>`_ language and the `QuBOX <https://qubox.ufsc.br/qubox.html>`_ simulator.


What is a qubit?
----------------

The qubit (**qu**\ antum + **bit**) is a quantum bit.
The classical bit is always in one of the possible states 0 or 1, while a qubit can be in both configurations simultaneously.
We call this phenomenon of `superposition`.
To represent a qubit we use the Dirac or `braket` notation:

.. math::
    \left | \psi \right \rangle = \begin{bmatrix} a \\ b \end{bmatrix} = a \left| 0 \right \rangle + b \left| 1 \right \rangle

on what :math:`a` and :math:`b` are `probability amplitudes` (complex numbers), so that

.. TODO: traduzir texto

.. math::
    |a|^2 \text{ representa a probabilidade de após uma medida encontrar o sistema no estado}
    \left| 0 \right\rangle

    |b|^2 \text{ representa a probabilidade de após uma medida encontrar o sistema no estado}
    \left| 1 \right\rangle

Since the total probability must add up :math:`100\%`, we have that the `normalization condition` for the state :math:`\left| \psi \right\rangle` is :math:`|a|^2 + |b|^2 = 1`.


Bloch’s Sphere
^^^^^^^^^^^^^^

The states of a qubit can be represented by points on a spherical surface of unit radius, using the spherical coordinate system.
For that, let’s parameterize the state of the qubit :math:`\left| \psi \right\rangle = a \left| 0 \right\rangle + b \left| 1 \right\rangle` this way

.. math::
    \left| \psi \right\rangle = \cos\left(  \dfrac{\theta}{2} \right) \left| 0 \right\rangle + e^{i\phi} \sin\left( \dfrac{\theta}{2} \right) \left| 1 \right\rangle \text{ tal que } \theta \in [0, \pi], \phi \in [0, 2\pi)

Now, using :math:`\theta` and :math:`\phi` in the spherical coordinate systems, we have the Bloch Sphere.
All states accessible to a qubit can be represented using the Bloch sphere.


.. image:: _static/Bloch_Sphere_dark.svg
    :width: 80%
    :align: center
    :class: only-dark, no-scaled-link

.. image:: _static/Bloch_Sphere.svg
    :width: 80%
    :align: center
    :class: only-light, no-scaled-link

Representation of 2 or more qubits
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

There are several ways to represent a system of 2 qubits, here are some equivalences:

.. math::
    \left| \psi_0 \right\rangle \otimes \left| \psi_1 \right\rangle = \left| \psi_0 \right\rangle \left| \psi_1 \right\rangle = \left| \psi_0 \psi_1 \right\rangle

on what :math:`\otimes` is tensor product of :math:`\psi_0` with :math:`\psi_1`.
So

.. math::
    \left| \psi_0 \right\rangle \otimes \left| \psi_1 \right\rangle
    = \begin{bmatrix} a_0 \\ a_1 \end{bmatrix} \otimes \begin{bmatrix} b_0 \\ b_1 \end{bmatrix}
    = \begin{bmatrix} a_0 b_0 \\ a_0 b_1 \\ a_1 b_0 \\ a_1 b_1 \end{bmatrix}

Analogously, it is possible to represent :math:`n` qubits like

.. math::
    \left| \psi_0 \right\rangle \otimes \left| \psi_1 \right\rangle \otimes \dots \otimes \left| \psi_n \right\rangle
    = \left| \psi_0 \right\rangle \left| \psi_1 \right\rangle \dots \left| \psi_n \right\rangle
    = \left| \psi_0 \psi_1 \dots \psi_n \right\rangle

.. TODO: traduzir

.. note::

    A superposição de estados desse tipo pode levar ao emaranhamento.

Steps of a Quantum Algorithm
-------------------------------

.. TODO: traduzir texto das imagens

.. image:: _static/enDiagramWhite.svg
    :width: 100%
    :align: center
    :class: only-light, no-scaled-link

.. image:: _static/enDiagramBlack.svg
    :width: 100%
    :align: center
    :class: only-dark, no-scaled-link


In general, we can separate a quantum algorithm into four steps.

#. **Preparation**: here each qubit is initialized in some state, usually in :math:`\left| 0 \right\rangle`.
#. **Evolution**: in this part the algorithm is actually applied, through the quantum logic gates.
#. **Measurement**: after applying the gates, it is necessary to measure the qubits, in order to obtain the result of the circuit.
#. **Post-processing**: finally, at this stage the result obtained must be interpreted according to the context.


Comparison with Classical Computing
-----------------------------------

Inputs and Outputs
^^^^^^^^^^^^^^^^^^

* **Classic**: gates can have different numbers of bits coming in and going out.

.. topic:: Example

    The AND gate has two or more input bits and only one output bit.

    .. image:: _static/gates/and_dark.svg
        :width: 15%
        :align: center
        :class: only-dark, no-scaled-link

    .. image:: _static/gates/and.svg
        :width: 15%
        :align: center
        :class: only-light, no-scaled-link

* **Quantum**: Gates have the same number of qubits at the input and output.

Reversibility
^^^^^^^^^^^^^

* **Classic**: most classic ports are not reversible, that is, given an output we cannot identify which were the inputs.

.. topic:: Example

    In the two-bit OR gate we can get 1 as an output in three cases.

    .. math::

        \begin{array}{cc|c}
            X & Y & X \text{ OR } Y \\
            0 & 0 & 0 \\
            0 & 1 & 1 \\
            1 & 0 & 1 \\
            1 & 1 & 1 \\
        \end{array}

    Knowing that the output was 1 it is not possible to identify which bits were 1.

* **Quantum**: its circuits are reversible; this is because its operators are unitary.

.. topic:: Observation

    Although the time evolution is reversible during information processing in the quantum circuit, the measurement of qubits is an irreversible process.

Quantum Logic Gates
-------------------

Quantum logic gates are `unitary` operations that, when acting (on/in) an initial state, lead to another final state, that is, they function as rotations in the Bloch sphere.
The following are some examples of quantum logic gates that act on a qubit.

X Gate
^^^^^^

This gate is the equivalent of the NOT gate in classical computing.

.. tab:: Matrix

    .. math::

        X = \sigma_x =
        \begin{bmatrix}
            0 & 1 \\
            1 & 0
        \end{bmatrix}

.. tab:: Behavior

    .. math::

        \begin{matrix}
            X \left| 0 \right\rangle &=& \left| 1 \right\rangle \\
            X \left| 1 \right\rangle &=& \left| 0 \right\rangle
        \end{matrix}

.. tab:: Symbol

    .. image:: _static/gates/xgate_dark.svg
        :width: 15%
        :align: center
        :class: only-dark, no-scaled-link

    .. image:: _static/gates/xgate.svg
        :width: 15%
        :align: center
        :class: only-light, no-scaled-link

    .. image:: _static/gates/targgate_dark.svg
        :width: 15%
        :align: center
        :class: only-dark, no-scaled-link

    .. image:: _static/gates/targgate.svg
        :width: 15%
        :align: center
        :class: only-light, no-scaled-link

Y Gate
^^^^^^

.. tab:: Matrix

    .. math::

            Y = \sigma_y =
            \begin{bmatrix}
                0 & -i \\
                i & 0
            \end{bmatrix}

.. tab:: Behavior

    .. math::

        \begin{matrix}
            Y \left| 0 \right\rangle &=& i\left| 1 \right\rangle \\
            Y \left| 1 \right\rangle &=& -i\left| 0 \right\rangle
        \end{matrix}

.. tab:: Symbol

    .. image:: _static/gates/ygate_dark.svg
        :width: 15%
        :align: center
        :class: only-dark, no-scaled-link

    .. image:: _static/gates/ygate.svg
        :width: 15%
        :align: center
        :class: only-light, no-scaled-link

Z Gate
^^^^^^

The Z gate introduces a relative phase of :math:`\pi` between the states of the computational base.

.. tab:: Matrix

    .. math::

        Z = \sigma_z =
        \begin{bmatrix}
            1 & 0 \\
            0 & -1
        \end{bmatrix}

.. tab:: Behavior

    .. math::

        \begin{matrix}
            Z \left| 0 \right\rangle &=& \left| 0 \right\rangle \\
            Z \left| 1 \right\rangle &=& -\left| 1 \right\rangle
        \end{matrix}

.. tab:: Symbol

    .. image:: _static/gates/zgate_dark.svg
        :width: 15%
        :align: center
        :class: only-dark, no-scaled-link

    .. image:: _static/gates/zgate.svg
        :width: 15%
        :align: center
        :class: only-light, no-scaled-link

Hadamard Gate
^^^^^^^^^^^^^

This gate generates a superposition of the computational base states.

.. tab:: Matrix

    .. math::

        H = \dfrac{1}{\sqrt{2}}
        \begin{bmatrix}
            1 & 1 \\
            1 & -1
        \end{bmatrix}

.. tab:: Behavior

    .. math::

        \begin{matrix}
            H \left| 0 \right\rangle &=& \dfrac{1}{\sqrt{2}} \left( \left| 0 \right\rangle + \left| 1 \right\rangle \right) &=& \left| + \right\rangle \\
            H \left| 1 \right\rangle &=& \dfrac{1}{\sqrt{2}} \left( \left| 0 \right\rangle - \left| 1 \right\rangle \right) &=& \left| - \right\rangle \\
        \end{matrix}

.. tab:: Symbol

    .. image:: _static/gates/hgate_dark.svg
        :width: 15%
        :align: center
        :class: only-dark, no-scaled-link

    .. image:: _static/gates/hgate.svg
        :width: 15%
        :align: center
        :class: only-light, no-scaled-link

Controlled Gates
^^^^^^^^^^^^^^^^

To do universal quantum computing, that is, to perform all the desired unitary transformations between the input and output qubits in an algorithm, it is necessary to perform operations that make two or more qubits interact with each other.
Such gates may involve one control qubit and the other as a target, and it is possible to generalize it to multiple control and target qubits.
Here’s an example for controlled port X, or CNOT, with a control and a target.


.. tab:: Matrix

    .. math::

        \text{CNOT} =
        \begin{bmatrix}
            1 & 0 & 0 & 0 \\
            0 & 1 & 0 & 0 \\
            0 & 0 & 0 & 1 \\
            0 & 0 & 1 & 0
        \end{bmatrix}

.. tab:: Behavior

    .. math::

        \begin{matrix}
            \text{CNOT} \left| 00 \right\rangle &=& \left| 00 \right\rangle \\
            \text{CNOT} \left| 01 \right\rangle &=& \left| 01 \right\rangle \\
            \text{CNOT} \left| 10 \right\rangle &=& \left| 11 \right\rangle \\
            \text{CNOT} \left| 11 \right\rangle &=& \left| 10 \right\rangle
        \end{matrix}

.. tab:: Symbol

    .. image:: _static/gates/cxgate_dark.svg
        :width: 15%
        :align: center
        :class: only-dark, no-scaled-link

    .. image:: _static/gates/cxgate.svg
        :width: 15%
        :align: center
        :class: only-light, no-scaled-link

    .. image:: _static/gates/ctarggate_dark.svg
        :width: 15%
        :align: center
        :class: only-dark, no-scaled-link

    .. image:: _static/gates/ctarggate.svg
        :width: 15%
        :align: center
        :class: only-light, no-scaled-link

Entanglement
------------

Entangled states are those that cannot be written as a tensor product of 1-qubit states, that is, it is not possible to separate them.
The best known are the Bell states, which involve only 2 qubits, given by:

.. math::
    \begin{matrix}
        \left| \beta_{00} \right\rangle &=& \left| \Phi^+ \right\rangle &=& \dfrac{1}{\sqrt{2}} \left( \left| 00 \right\rangle + \left| 11 \right\rangle \right) \\
        \left| \beta_{01} \right\rangle &=& \left| \Phi^- \right\rangle &=& \dfrac{1}{\sqrt{2}} \left( \left| 00 \right\rangle - \left| 11 \right\rangle \right) \\
        \left| \beta_{10} \right\rangle &=& \left| \Psi^+ \right\rangle &=& \dfrac{1}{\sqrt{2}} \left( \left| 01 \right\rangle + \left| 10 \right\rangle \right) \\
        \left| \beta_{11} \right\rangle &=& \left| \Psi^- \right\rangle &=& \dfrac{1}{\sqrt{2}} \left( \left| 01 \right\rangle - \left| 10 \right\rangle \right)
    \end{matrix}

.. note::

    Entangled states are pointed out as being responsible for not only making quantum computing faster than classical computing, but also allowing to increase the accuracy of measurements of physical observables and carry out communication in a secure way.

Creating a Bell State
^^^^^^^^^^^^^^^^^^^^^

We’ve already seen what entanglement is, now let’s create it.
As an example, we will create the state :math:`\left| \beta_{00} \right\rangle`, below you can choose to see the circuit or the code in Ket.

.. tab:: Circuit

    .. image:: _static/bell_state.svg
        :width: 50%
        :align: center
        :class: only-light, no-scaled-link

    .. image:: _static/bell_state_dark.svg
        :width: 50%
        :align: center
        :class: only-dark, no-scaled-link


.. tab:: Code

    .. code-block:: ket

        q0, q1 = quant(2)   # create two qubits
        H(q0)               # apply Hadamard gate on qubit 0
        ctrl(q0, X, q1)     # apply X gate on qubit 1, with qubit 0 as control

Be :math:`\left| \psi \right\rangle = q_0 \otimes q_1`.
After applying the Hadamard gate, we will have :math:`q_0 = \dfrac{1}{\sqrt{2}} \left( \left| 0 \right\rangle + \left| 1 \right\rangle \right)` as seen above.

Soon,

.. math::

    \begin{matrix}
        \left| \psi \right\rangle &=&    \dfrac{1}{\sqrt{2}} \left( \left| 0 \right\rangle + \left| 1 \right\rangle \right) \otimes \left| 0 \right\rangle \\
        &=& \dfrac{1}{\sqrt{2}} \left( \left| 00 \right\rangle + \left| 10 \right\rangle\right)
    \end{matrix}

Next, we have a CNOT gate, with qubit 0 as control and qubit 1 as target.
Generating the following situation

.. math::

    \begin{matrix}
        \left| \psi \right\rangle &=&        \text{CNOT} \left[ \dfrac{1}{\sqrt{2}} \left( \left| 00 \right\rangle + \left| 10 \right\rangle\right) \right] \\
        &=& \dfrac{1}{\sqrt{2}} \left( \text{CNOT} \left| 00 \right\rangle + \text{CNOT} \left| 10 \right\rangle \right) \\
        &=& \dfrac{1}{\sqrt{2}} \left( \left| 00 \right\rangle + \left| 11 \right\rangle \right) \\
        &=& \left| \beta_{00} \right\rangle
    \end{matrix}

Therefore, with only two ports it is possible to generate an entanglement situation.

.. tip::

    If you are interested in quantum computing and want to delve a little deeper into the subject, we recommend the book:

    Michael A. Nielsen and Isaac L. Chuang. *Quantum Computation and Quantum Information – 10th Anniversary Edition*. Cambridge University Press, 10th anv edition, 2010. https://doi.org/10.1017/CBO9780511976667.
