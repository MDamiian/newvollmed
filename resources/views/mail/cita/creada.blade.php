<x-mail::message>
    # Confirmación de Cita en VOLLMED

    Estimado/a {{$consulta->paciente->datos->nombre}},

    Le informamos que su cita en VOLLMED ha sido agendada con éxito. A continuación, le proporcionamos los detalles
    de su cita:

    **Fecha y hora:** {{$consulta->fecha_hora}}
    **Médico:** {{$consulta->medico->datos->nombre}}

    Por favor, asegúrese de llegar a tiempo para su cita y de traer consigo cualquier documentación relevante. Si
    necesita reprogramar su cita o tiene alguna pregunta, no dude en ponerse en contacto con nosotros.

    ¡Esperamos poder atenderle pronto en VOLLMED!

    Atentamente,
    El equipo de VOLLMED
</x-mail::message>