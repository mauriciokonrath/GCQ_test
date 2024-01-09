QuBOX Simulator
===============

QuBOX is a portable hardware that embeds Quantuloop simulators developed by Quantuloop.
Designed to help in quantum computing education and research, the QuBOX simulator is a practical solution to accelerate the quantum execution of applications written in Ket.

The QuBOX Simulator was designed to be taken to the classroom or laboratory, without the need for any infrastructure other than access to network and power.
At UFSC, the QuBOX simulator is available for cloud access, and it takes few configurations for you to speed up your quantum application.

To have access to the QuBOX simulator allocated at UFSC it is necessary to have an access key, go to the `link <https://forms.gle/cjAkzPbjZoKFv3jj6>`_ to request your key.
For information on how to configure access, see the :ref:`Installation and Configuration` section.

Specifications
--------------

The simulator has two simulation modes, **sparse** and **dense**, with simulation time complexity associated with different aspects of quantum computing.
The simulation time of the **sparse** mode depends on the number of computational basis states required to represent the quantum state.
For the **dense** mode, on the other hand, the simulation time depends on the number of qubits.
In other words, the simulation time complexity to prepare a state :math:`\sum_{k=0}^{2^n-1}\alpha_k\left|k\right>`, where :math:`n` is the number of qubits, grows exponentially with :math:`n` for the **dense** model and linearithmic with the number of states for the **sparse** model.
For example, :math:`n-1` CNOT gates are required to prepare a GHZ state :math:`\frac{1}{\sqrt{2}}(\left|0\dots0\right>+\left|1\dots1\right>)` of :math:`n` qubits, whereby in **sparse** mode each CNOT gate has constant simulation time complexity with respect to the number of qubits and in **dense** mode it has exponential complexity.
On the other hand, to prepare a state :math:`\frac{1}{\sqrt{2^n}}\sum_{k=0}^{2^n-1}\left|k\right>` of :math:`n` qubits are needed :math:`n` Hadamard gates, which generates a simulation time complexity :math:`O(2^n\log{2^n})` in the **sparse** model and :math:`O(n2^n)` in the **dense** model.

.. note::

    The simulation mode should be chosen according to the specific characteristics of each quantum algorithm.

In addition to the simulation modes, the sparse simulator makes it possible to choose the precision of floating-point operations, with both **single** (``float``) and **double** (``double``) precision options.
Simulating with **double** precision considerably reduces rounding errors, something that can invalidate the result of an execution with many quantum logic gates.
On the other hand, with **single** precision it is possible to simulate larger quantum states or in a shorter time.
In short simulations there is no practical difference between using single
or double precision, so it is recommended to use **single** precision.
The precision of floating-point operations have a greater impact in the
**sparse** model.

The table below presents the simulation capacity of QuBOX.
For the **sparse** model, the unit of measurement used is the amount of states of the computational basis needed to represent the quantum system, being possible to spread these states over up to 2048 qubits. In the **dense** model, the simulation size is defined by the number of qubits.


.. TODO: traduzir tabela.

.. list-table:: Simulation Capability
    :header-rows: 1
    :stub-columns: 1
    :align: center
    :widths: 11 9 9
    
    * - 
      - Sparse 
      - Dense
    * - Single Precision (``float``)
      - :math:`2^{27}` State in Superposition
      - 30 Qubits
    * - Double Precision (``double``)
      - :math:`2^{28}` State in Superposition
      - NA


.. _Installation and Configuration:

Installation and Configuration
------------------------------

The Ket Language and the client to access QuBOX can be installed using the ``pip`` command.
Python 3.7 or newer is required.
Use the command below to install the packages.

.. code-block:: bash

    pip install pip -U
    pip install ket-lang -U
    pip install qubox-ufsc

To configure Ket to use QuBOX in quantum execution, import the module
``qubox_ufsc`` as in the example below.

.. code-block:: py

    import qubox_ufsc
    qubox_ufsc.login(
        name="Your Name",
        email="you_email@example.com",
        affiliation="Your Affiliation"
    )

The table below presents optional commands for selecting the mode and accuracy of the simulation.
By default, QuBOX uses **sparse** simulation with **simple** precision.

.. TODO: traduzir tabela

.. list-table:: SImulator Configuration 
    :header-rows: 1
    :stub-columns: 1

    * - 
      - Sparse
      - Dense
    * - Single Precision
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

    * - | Double
        | Precision
      - 
        .. code-block:: py

            qubox_ufsc.config(
                mode="sparse",
                precision=2,
            )

      - NA
