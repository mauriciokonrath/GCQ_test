Ket's Tutorial
==============

Ket is an embedded Python programming language designed to facilitate the development of hybrid classical-quantum applications.
Ket is an open-source project derived from the `master’s work by Evandro C. R. Rosa <https://repositorio.ufsc.br/handle/123456789/229874>`_ at the Graduate Program in Computer Science (PPGCC) at UFSC.
For more information, visit https://quantumket.org.

Installation |PyPI|
-------------------

.. |PyPI| image::  https://img.shields.io/pypi/v/ket-lang


Ket is available for Linux, Windows, and macOS `PyPi <https://pypi.org/project/ket-lang>`_ and can be installed ``pip``, as in the command below:

.. code-block:: bash

    pip install ket-lang -U

You can use Ket in **Google Colab**.
To do so, go to https://colab.research.google.com and use the command below:

.. code-block:: bash

    !pip install ket-lang -q

Basic Guide
-----------

The following code imports the Ket and instances a list of qubits (a :class:`~ket.libket.quant`).

.. code-block:: ket

    from ket import *
    q = quant(10)

It is possible to index the qubits of a :class:`~ket.libket.quant` using square brackets in
the same way we do with elements of a list in Python.
Below are examples of this and how we can apply quantum gates to these qubits.
You can check out the quantum gates available in Ket `here <https://quantumket.org/ket.html#module-ket.gates.quantum_gate.quantum_gate>`_

.. TODO: traduzir

.. code-block:: ket

    H(q[-1]) # Hadamard in the last qubit
    X(q[0])  # Pauli X in the first qubit
    Y(q[:5]) # Pauli Y in the first five qubits
    Z(q[5:]) # Pauli Z in the fifth qubit onwards

To apply controlled logic gates in Ket it is possible to use the function :func:`~ket.standard.ctrl`.
For example, the command ``ctrl(control_qubits, gate, target_qubits)`` applies the ``gate`` to all ``target_qubits`` when the ``control_qubits`` are in :math:`\left|1\right>`.
Optionally, you can choose a specific state to apply a port using the parameter ``on_state``.
For example, ``ctrl(control_qubits, gate, target_qubits, on_state=2)`` will apply ``gate`` when ``qubits_control`` are in the state :math:`\left|0\dots0 10 \right\rangle`.

Measure
^^^^^^^

The only operation that affects both the classical state and the quantum state is measurement.
The :func:`~ket.standard.measure` function takes one :class:`~ket.libket.quant` as a parameter and
returns a :class:`~ket.libket.future`.
To access the result of the measure, just read the ``.value`` attribute of the returned :class:`~ket.libket.future`.

Example of measurement in Ket:

.. TODO: traduzir

.. code-block:: ket

    a, b = quant(2)
    H(a)
    ctrl(a, X, b)
    # Measure of qubits
    measurement = measure(a+b)
    # Take the value of the quantum computer
    result = measurement.value

.. tip::

    Ket allows to perform several media in a single quantum execution, in addition, it is possible to use the result of a quantum measurement to control the execution flow in the quantum computer.
    For more information see https://quantumket.org/runtime.html.

View the Quantum State
^^^^^^^^^^^^^^^^^^^^^^

Ket allows you to visualize the states of the computational basis that compose the quantum superposition using a variable of type :class:`~ket.libket.dump`.
This is an operation that has no side effect on the quantum state, however, it is only
possible in simulated quantum executions.

As we can see in the example below, it is possible to iterate over a quantum state using the :attr:`~ket.libket.dump.states` and :attr:`~ket.libket.dump.amplitudes` attributes
of a :class:`~ket.libket.dump`

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


Using method :meth:`~ket.libket.dump.show`, it is possible to print the quantum state of a :class:`~ket.libket.dump`.
For example:

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


Mini Course
-----------

During the `IV Workshop on Quantum Computing at UFSC <https://workshop-cq.ufsc.br/2021>`_, an event organized by GCQ-UFSC, we had the mini course `Introduction to Quantum Computing with Ket`.
It presents the basic concepts of quantum computing and how we can use them in Ket.
You can check out the full mini-course in the videos below or on the `GCQ-UFSC YouTube <https://www.youtube.com/c/GCQUFSC>`_ channel.

**Part 1**

.. raw:: html

    <div align="center">
    <iframe width="100%" height="315" src="https://www.youtube-nocookie.com/embed/LnNh-l1_bNc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

**Part 2**

.. raw:: html

    <div align="center">
    <iframe width="100%" height="315" src="https://www.youtube-nocookie.com/embed/E44ejmGi7lg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
