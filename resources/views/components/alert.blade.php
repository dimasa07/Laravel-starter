<dialog {{ $attributes }} class="modal" x-init="$el.showModal()">

	<div class="modal-box" x-data="{
		type: data.type ?? 'info',
		title: data.title ?? 'Title',
		message: data.message ?? 'Message',
		neutralButton: data.neutralButton ?? 'OK',
		negativeButton: data.negativeButton ?? 'No',
		positiveButton: data.positiveButton ?? 'Yes',
		action: data.action ?? function(){},
		form: data.form ?? null
	}">
	<h3 class="text-lg font-bold" x-html="title"></h3>
	<p class="py-4" x-html="message"></p>
	<div class="modal-action" :class="type == 'info' ? 'justify-center' : ''">
		<template x-if="type == 'info'">
			<div class="min-w-[25%] mx-auto">
				<button @click="alert=null" class="btn btn-info w-full" x-html="neutralButton"></button>
			</div>
		</template>
		<template x-if="type == 'confirm'">
			<div class="flex w-1/2 gap-2 justify-between">
				<button @click="alert=null" class="btn w-1/2" x-html="negativeButton"></button>
				<template x-if="form">
					<div class="w-1/2">
						<form :action="form.action" :method="form.method">
							@csrf
							<template x-if="form.methodType.toLowerCase() == 'delete'">
							@method('DELETE')
							</template>
							<template x-if="form.methodType.toLowerCase() == 'patch'">
							@method('PATCH')
							</template>
							<template x-if="form.methodType.toLowerCase() == 'put'">
							@method('PUT')
							</template>
							<button type="submit" class="btn btn-warning w-full" x-html="positiveButton"></button>
						</form>
					</div>
				</template>
				<template x-if="!form">
					<button @click="action()" class="btn btn-warning w-1/2" x-html="positiveButton"></button>
				</template>
			</template>
		</div>
	</div>
</dialog>