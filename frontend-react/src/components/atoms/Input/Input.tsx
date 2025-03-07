import { InputProps } from './types'

const Input = ({ label, ...props }: InputProps) => {
  return (
    <div>
      {label && <label>{label}</label>}
      <input {...props} />
    </div>
  )
}

export default Input
