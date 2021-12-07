function printTriangle(depth, symbol){
	let toPrint = symbol;
	for(let i = 0; i < depth ; i++){
		console.log(toPrint);
		toPrint += symbol;
	}
}